<?php

namespace App\Http\Services\Admin\Order;

use App\Models\Order;
use App\Models\Store;
use App\Models\Detail;
use App\Models\Price;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    // list order
    public function list()
    {
        $store = Store::where('user_id', Auth::user()->id)->first();
        $order = Order::where('store_id', $store->id)->orderBy('created_at', 'DESC')->get();
        return $order;
    }

    public function detail($id)
    {
        return Order::find($id);
    }

    public function update($r)
    {
        $order = Order::find($r->id);
        $order->description = $r->description;
        $order->status = $r->status;

        if($r->status == 4) {
            $listDetail = Detail::where('order_id', $order->id)->get();
            foreach ($listDetail as $key => $value) {
                $price = Price::where('store_id', $order->store_id)->where('product_id', $value->product_id)->first();
                if($price) {
                    $price->update([
                        'qty' => $price->qty + $value->qty
                    ]);
                }
            }
        }

        $order->save();

        return $order;
    }

    public function getDetail($id)
    {
        return Order::leftjoin('signatures', 'signatures.order_type', '=', 'orders.order_code')
                    ->where('orders.id', $id)
                    ->select('orders.*', 'signatures.amount', 'signatures.transaction_no', 'signatures.bank_code', 'signatures.pay_date')
                    ->first();
    }

}
