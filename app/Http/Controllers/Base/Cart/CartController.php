<?php

namespace App\Http\Controllers\Base\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Cart\CartService;
use Exception;

class CartController extends Controller
{
    //
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;

            $result = $this->cart->getList($perPage, $pageNumber);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->cart->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $result = $this->cart->delete($request->ids);
            return $this->sendSuccessData($result, "delete success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
