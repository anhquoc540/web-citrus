<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Order\OrderService;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }

    //
    public function list()
    {
        $list = $this->order->list();
        return view('expert.order.list', [
            'title' => 'Danh sách đơn hàng',
            'list' => $list
        ]);
    }

    public function detail(Request $requests)
    {
        $result = $this->order->detail($requests->id);

        if($result) {
            return response()->json([
                'error' => false,
                'data' => $result,
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function store(Request $requests)
    {
        $result = $this->order->update($requests);
        if($result) {
            return response()->json([
                'error' => false,
                'data' => $result,
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function show($id)
    {
        $result = $this->order->getDetail($id);
        return view('expert.order.detail', ['title' => 'Chi Tiết Đơn Hàng', 'data' => $result]);
    }

    public function create()
    {
        return view('expert.order.add', ['title' => 'Tạo Đơn Hàng']);
    }
}
