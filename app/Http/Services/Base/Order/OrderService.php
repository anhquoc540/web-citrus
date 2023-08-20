<?php

namespace App\Http\Services\Base\Order;

use AlException;
use App\Models\Order;
use App\Models\Store;
use App\Models\Address;
use App\Models\Price;
use App\Models\Detail;
use App\Models\Cart;
use App\Http\Services\Custom\QueryCustom;
use App\Http\Services\Custom\VnpayService;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderService
{
    protected $queryCustom;
    protected $vnpay;
    public function __construct(QueryCustom $queryCustom, VnpayService $vnpay)
    {
        $this->queryCustom = $queryCustom;
        $this->vnpay = $vnpay;
    }

    public function getList($perPage, $pageNumber, $status)
    {
        $list = Order::where('user_id', Auth::user()->id)
                        ->where('status', $status)
                        ->orderBy('created_at', 'DESC')
                        ->paging($perPage, $pageNumber);

        foreach ($list['data'] as $key => $value) {
            $products = DB::table('details')->join('products', 'products.id', '=', 'details.product_id')
                                        ->where('details.order_id', $value->id)
                                        ->select('products.id', 'products.name', 'products.photo')
                                        ->get();

            foreach ($products as $key => $vl) {
                $vl->photo = json_decode($vl->photo);
            }

            // $value->status = $this->getStatus($value->status);

            $value->address;
            $value->products = $products;
            $value->store;
            $value->store->photo = json_decode($value->store->photo);
        }

        return $list;
    }

    public function create($request)
    {
        $data = $request->input();
        do {
            $orderCode = 'OR' . rand(1000, 9999);
            // check order_code have exists then render again
            $check = Order::where('order_code', $orderCode)->first();
        } while ($check !== null);

        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['status'] = 1;
        $data['paid'] = 0;
        $data['payment'] = $request->payment == 1 ? 1 : 2;
        $data['order_code'] = $orderCode;
        if(!$request->address_id) {
            if(!$user->address_id) {
                $al = AlException::withMessages([
                    'error_address' => [trans('messages_mb.USER_006')],
                ]);
                $al->status('USER_006');
                throw $al;
            } else {
                $data['address_id'] = $user->address_id;
            }
        }

        $store = Store::find($request->store_id);
        $addressUser = Address::find($data['address_id']);
         
        $distance = $this->calculateDistance($store->latitude, $store->longitude, $addressUser->latitude, $addressUser->longitude);
        $shippingFee = $this->shippingFee($distance);

        $data['shipping_fee'] = $shippingFee;
        unset($data['products']);

        $detailOrder = [];
        $totalOrder = 0;
        foreach ($request->products as $key => $value) {
            $price = Price::where('store_id', $request->store_id)->where('product_id', $value['id'])->first();
            // tinh tổng cho 1 loại thuốc
            $totalPrice = $price->price * $value['qty'];
            // tổng tiền thuốc của 1 đơn hàng (chưa bao gồm phí ship)
            $totalOrder = $totalOrder + $totalPrice;
            $detailOrder[] = [
                                'product_id' => $value['id'], 
                                'qty' => $value['qty'],
                                'product_name' => $price->products->name, 
                                'price' => $price->price,
                                'total_price' => $totalPrice
                                
                            ];
        }

        $data['total'] = $totalOrder + $shippingFee;

        $order = Order::create($data);

        // thanh toan bang tien mat
        if($request->payment !== 1) {
            foreach ($detailOrder as $key => $value) {
                $value['order_id'] = $order->id;
                DB::table('details')->insert(
                    $value
                );
    
                // update qty product of store
                $price = Price::where('store_id', $request->store_id)
                        ->where('product_id', $value['product_id'])
                        ->first();
                $price->update([
                            'qty' => $price->qty - $value['qty']
                        ]);
            }
    
            // delete cart after create order
            Cart::where('user_id', $user->id)->delete();
        } else {
            // create order details
            foreach ($detailOrder as $key => $value) {
                $value['order_id'] = $order->id;
                DB::table('details')->insert(
                    $value
                );
            }
        }

        if($request->payment == 1) {
            $payment = $this->vnpay->createPayment($order->total, $order->order_code);
            
            return ['link' => $payment, 'order' => $order];
        }

        return $this->getDetail($order->id);
    }

    public function getDetail($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$order) {
            return null;
        }
        // $order->status = $this->getStatus($order->status);
        
        $products = DB::table('details')->join('products', 'products.id', '=', 'details.product_id')
                                        ->where('details.order_id', $id)
                                        ->select('products.id', 'products.name', 'products.photo')
                                        ->get();
        foreach ($products as $key => $value) {
            $value->photo = json_decode($value->photo);
        }
        
        $order->address;
        $order->products = $products;
        $order->store;
        $order->store->photo = json_decode($order->store->photo);

        return $order;
    }

    public function getStatus($status)
    {
        if($status == 1) {
            return STATUS_01;
        } else if($status == 2) {
            return STATUS_02;
        } else if($status == 3) {
            return STATUS_03;
        } else if($status == 4) {
            return STATUS_04;
        } else if($status == 5) {
            return STATUS_05;
        } else {
            return "Unknown";
        }
    }

    // tính khoản cách
    public function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers')
    {
        $theta = $longitude1 - $longitude2; 
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
        $distance = acos($distance); 
        $distance = rad2deg($distance); 
        $distance = $distance * 60 * 1.1515; 
        switch($unit) { 
            case 'miles': 
            break; 
            case 'kilometers' : 
            $distance = $distance * 1.609344; 
        } 

        return (round($distance,2)); 
    }

    public function shippingFee($distance)
    {
        $shippingFee = 10000;

        if($distance <= 5) {
            $shippingFee = 10000;
        } else if($distance > 5 && $distance <= 10) {
            $shippingFee = 20000;
        } else if($distance > 10 && $distance <= 20) {
            $shippingFee = 30000;
        } else if($distance > 20 && $distance <= 100) {
            $shippingFee = 40000;
        } else if($distance > 100 && $distance <= 300) {
            $shippingFee = 50000;
        } else if($distance > 300 && $distance <= 600) {
            $shippingFee = 60000;
        } else if($distance > 600 && $distance <= 900) {
            $shippingFee = 70000;
        } else if($distance > 900 && $distance <= 1500) {
            $shippingFee = 80000;
        } else {
            $shippingFee = 90000;
        }

        return $shippingFee;
    }

    public function deleted($id)
    {
        $order = Order::find($id);
        if(!$order) {
            return false;
        }
        $order->delete();

        return true;
    }

    public function getShippingFee($request)
    {
        $store = Store::find($request->store_id);
         
        $distance = $this->calculateDistance($store->latitude, $store->longitude, $request->latitude, $request->longitude);
        $shippingFee = $this->shippingFee($distance);

        return ["distance" => $distance, "shippingFee" => $shippingFee];
    }

    public function confirm($orderId, $status)
    {
        $order = Order::find($orderId);
        if(!$order) {
            $al = AlException::withMessages([
                'error_order' => [trans('messages_mb.ORDER_002')],
            ]);
            $al->status('ORDER_002');
            throw $al;
        } 

        if($order->status == 3 || $order->status == 4 || $status == 1 || $status == 2) {
            $al = AlException::withMessages([
                'error_confirm' => [trans('messages_mb.ORDER_001')],
            ]);
            $al->status('ORDER_001');
            throw $al;
        }

        if($order->status == 2 && $status == 4) {
            $al = AlException::withMessages([
                'error_confirm' => [trans('messages_mb.ORDER_003')],
            ]);
            $al->status('ORDER_003');
            throw $al;
        }

        if($status == 4) {
            $listDetail = Detail::where('order_id', $orderId)->get();
            foreach ($listDetail as $key => $value) {
                $price = Price::where('store_id', $order->store_id)->where('product_id', $value->product_id)->first();
                if($price) {
                    $price->update([
                        'qty' => $price->qty + $value->qty
                    ]);
                }
            }
        }

        $order->update([
            'status' => $status
        ]);
        
        return $order;
    }

}
