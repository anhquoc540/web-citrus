<?php

namespace App\Http\Services\Admin\Store;

use App\Models\Store;
use App\Models\Price;
use Illuminate\Support\Str;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Admin\Product\ProductService;

class StoreService
{
    protected $queryCustom;
    protected $product;
    public function __construct(QueryCustom $queryCustom, ProductService $product)
    {
        $this->queryCustom = $queryCustom;
        $this->product = $product;
    }

    // list products of store
    public function listProductStore()
    {
        $userId = Auth::user()->id;
        $store = Store::where('user_id', $userId)->first();
        if($store) {
            $products = DB::table('prices')->where('store_id', $store->id)
                            ->join('products', 'products.id', '=', 'prices.product_id')
                            ->select(
                                        'prices.id', 
                                        'prices.product_id', 
                                        'prices.store_id', 
                                        'prices.date_of_manufacture', 
                                        'prices.date_of_expiry', 
                                        'price', 
                                        'qty', 
                                        'prices.status', 
                                        'products.name', 
                                        'products.manufacturer'
                                    )
                            ->get();
            return $products;
        }

        return [];
    }

    // get list products to import into store
    public function listProductImport()
    {
        $userId = Auth::user()->id;
        $store = Store::where('user_id', $userId)->first();
        if($store) {
            $productStore = DB::table('prices')->where('store_id', $store->id)
                            ->pluck('product_id')
                            ->toArray();

            $listProduct = DB::table('products')->whereNotIn('id', $productStore)->where('deleted_at', null)->get();
            return $listProduct;
        }

        return [];
    }

    // import products to store
    public function importProductStore($request)
    {
        $storeId = Store::where('user_id', Auth::user()->id)->first()->id;
        return Price::create([
            'product_id' => $request->product_id,
            'store_id' => $storeId,
            'price' => $request->price,
            'qty' => $request->qty,
            'status' => 1,
            'date_of_manufacture' => date_format(date_create($request->date_of_manufacture), "Y-m-d"),
            'date_of_expiry' => date_format(date_create($request->date_of_expiry), "Y-m-d"),
        ]);
    }

    // delete product khoi store
    public function destroy($r)
    {
        $id = $r->id;
        $price = Price::find($id);

        if($price) {
            $price->delete();
            
            return true;
        }

        return false;
    }

    // get one product of store
    public function detail($r)
    {
        return DB::table('prices')->where('prices.id', $r->id)
                            ->join('products', 'products.id', '=', 'prices.product_id')
                            ->select(   'prices.id', 
                                        'prices.product_id', 
                                        'prices.store_id', 
                                        'price', 
                                        'qty', 
                                        'products.name',
                                        'prices.date_of_manufacture', 
                                        'prices.date_of_expiry'
                            )
                            ->first();
    }

    // update one product of store
    public function update($r)
    {
        $price = Price::find($r->price_id);
        $price->price = $r->price;
        $price->qty = $r->qty;
        $price->date_of_manufacture = date_format(date_create($r->date_of_manufacture), "Y-m-d");
        $price->date_of_expiry = date_format(date_create($r->date_of_expiry), "Y-m-d");
        $price->save();

        return $price;
    }

}
