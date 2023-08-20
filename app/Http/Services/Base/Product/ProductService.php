<?php

namespace App\Http\Services\Base\Product;

use App\Models\Product;
use App\Models\Price;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
use AlException;

class ProductService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        $data = $request->input();
        return Product::create($data);
    }

    public function getList($storeId, $productIds, $perPage, $pageNumber)
    {
        $model = new Product();
        $query = $model->query();

        $arrProductIds = Str::of($productIds)->explode(',');
        if(count($arrProductIds) > 1) {
            $query->whereIn('products.id', $arrProductIds);
        } else {
            if(count($arrProductIds) == 1 && $arrProductIds[0]) {
                $query->whereIn('products.id', $arrProductIds);
            }
        }

        if($storeId) {
            $list = $query->join('prices', 'products.id', '=', 'prices.product_id')
                            ->where('store_id', $storeId)->paging($perPage, $pageNumber);
        } else {
            $listProductId = Price::select('product_id')->groupBy('product_id')->pluck('product_id');
            $list = $query->whereIn('id', $listProductId)->paging($perPage, $pageNumber);
        }

        
        foreach ($list['data'] as $key => $value) {
            $value->photo = json_decode($value->photo);
            if(!$storeId) {
                $minPrice = Price::where('product_id', $value->id)->min('price');
                $maxPrice = Price::where('product_id', $value->id)->max('price');

                $value->min_price = $minPrice;
                $value->max_price = $maxPrice;
            }
        }

        return $list;
    }

    public function getDetail($id)
    {
        $product = Product::find($id);
        if(!$product) {
            $al = AlException::withMessages([
                'find_stages' => [trans('messages.PRODUCT_001', ['attribute' => $id])],
            ]);
            $al->status('PRODUCT_001');
            throw $al;
        }
        $product->photo = json_decode($product->photo);
        $product->therapy;
        return $product;
    }

    public function updated($request, $id)
    {
        $product = Product::find($id);
        if(!$product) {
            $al = AlException::withMessages([
                'find_stages' => [trans('messages.PRODUCT_001', ['attribute' => $id])],
            ]);
            $al->status('PRODUCT_001');
            throw $al;
        }

        $input = $request->input();
        $product->update($input);

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            $product->delete();
            return true;
        }

        $al = AlException::withMessages([
            'delete_dis' => [trans('messages.PRODUCT_001', ['attribute' => $id])],
        ]);
        $al->status('PRODUCT_001');
        throw $al;
    }
}
