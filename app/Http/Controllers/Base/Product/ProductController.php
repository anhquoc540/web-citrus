<?php

namespace App\Http\Controllers\Base\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Product\ProductService;
use Exception;

class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        //
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;
            $storeId = $request->store_id;
            $productIds = $request->product_ids;

            $result = $this->product->getList($storeId, $productIds, $perPage, $pageNumber);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $result = $this->product->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id)
    {
        //
        try {
            $result = $this->product->getDetail($id);
            return $this->sendSuccessData($result, "get detail success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $result = $this->product->updated($request, $id);
            return $this->sendSuccessData($result, "update success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $result = $this->product->destroy($id);
            return $this->sendSuccessData($result, "delete success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
