<?php

namespace App\Http\Controllers\Base\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Store\StoreService;
use Exception;


class StoreController extends Controller
{
    protected $store;
    public function __construct(StoreService $store)
    {
        $this->store = $store;
    }

    //
    public function list(Request $request)
    {
        //
        try {
            $near = $request->near;
            $productIds = $request->productids;
            $lat = $request->latitude;
            $long = $request->longitude;
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;
            $result = $this->store->getList($productIds, $lat, $long, $perPage, $pageNumber, $near);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
