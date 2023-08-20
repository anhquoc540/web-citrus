<?php

namespace App\Http\Services\Admin\Report;

use App\Models\Order;
use App\Models\Store;
use App\Models\Detail;
use App\Models\Price;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use DB;
use Illuminate\Support\Facades\Auth;

class ReportService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    // get report by date
    public function getByDate($fromTo)
    {
        $date = explode(" - ", $fromTo);
        $store = Store::where('user_id', Auth::user()->id)->first();
        if(count($date) > 1) {
            $startDate = date("Y-m-d", strtotime($date[0]));
            $endDate = date("Y-m-d", strtotime($date[1]));
            
            $order = Order::where('store_id', $store->id)
                            ->where('created_at', '>=', $startDate)
                            ->where('created_at', '<=', $endDate)
                            ->orderBy('created_at', 'DESC')
                            ->get();
        }

        $totalOrderSuccess = 0; 
        $allOrderSuccess = Order::where('store_id', $store->id)
                                    ->where('status', 3)
                                    ->where('created_at', '>=', date("Y-01-01"))
                                    ->where('created_at', '<=', date("Y-m-d"))
                                    ->get();
        foreach ($allOrderSuccess as $k => $v) {
            $totalOrderSuccess = $totalOrderSuccess + $v->total; 
        }

        $shipFee = 0;
        $orderCancel = 0;
        $orderSuccess = 0;
        $totalPay = 0;
        $listOrderSuccess = [];

        foreach ($order as $key => $value) {
            if($value->status == 4) {
                $orderCancel = $orderCancel + 1;
            }
            if($value->status == 3) {
                $shipFee = $shipFee + $value->shipping_fee;
                $orderSuccess = $orderSuccess + 1;
                $totalPay = $totalPay + $value->total;
                $listOrderSuccess[] = $value;
            }
        }
        
        return [
                    'list' => $listOrderSuccess, 
                    'shipFee' => $shipFee, 
                    'orderCancel' => $orderCancel, 
                    'orderSuccess' => $orderSuccess, 
                    'totalPay' => $totalPay,
                    'store' => $store,
                    'totalOrderSuccess' => $totalOrderSuccess
                ];

        
    }

    public function detail($id)
    {
        return Order::find($id);
    }

}
