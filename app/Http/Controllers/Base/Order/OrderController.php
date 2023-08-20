<?php

namespace App\Http\Controllers\Base\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Order\OrderService;
use Exception;

class OrderController extends Controller
{
    //
    protected $order;
    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;
            $status = $request->status ? $request->status : 1;

            $result = $this->order->getList($perPage, $pageNumber, $status);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->order->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function detail($id)
    {
        try {
            $result = $this->order->getDetail($id);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->order->deleted($id);
            return $this->sendSuccessData($result, "delete success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function getShippingFee(Request $request)
    {
        try {
            $result = $this->order->getShippingFee($request);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function confirm(Request $request)
    {
        try {
            $orderId = $request->order_id;
            $status = $request->status;

            $result = $this->order->confirm($orderId, $status);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
