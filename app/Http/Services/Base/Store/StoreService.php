<?php

namespace App\Http\Services\Base\Store;

use App\Models\Store;
use App\Models\Price;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
use App\Http\Services\Base\Order\OrderService;
use AlException;

class StoreService
{
    protected $queryCustom;
    protected $order;
    public function __construct(QueryCustom $queryCustom, OrderService $order)
    {
        $this->queryCustom = $queryCustom;
        $this->order = $order;
    }

    public function getList($productIds, $latitude, $longitude, $perPage, $pageNumber, $near)
    {
        // get list store have products
        $listStores = Store::all();
        $arrProductId = explode(",", $productIds);
        $listIdStores = [];
        foreach ($listStores as $key => $value) {
            // get product of a store
            $arrProducts = [];
            foreach ($value->price as $k => $v) {
                if($v->qty > 0) {
                    $arrProducts[] = $v->product_id;
                }
            }
            // compare product from request have exist in store
            $check = $this->is_subset($arrProductId, $arrProducts);
            if($check) {
                $listIdStores[] = $value->id;
            }
        }

        if($near) {
            // get store near 50km
            $distance = 100000;
            $haversine = "(
                6371 * acos(
                    cos(radians(" .$latitude. "))
                    * cos(radians(`latitude`))
                    * cos(radians(`longitude`) - radians(" .$longitude. "))
                    + sin(radians(" .$latitude. ")) * sin(radians(`latitude`))
                )
            )";

            $stores = Store::select('stores.*')
                ->selectRaw("$haversine AS distance")
                ->having("distance", "<=", $distance)
                ->orderby("distance", "asc")
                ->whereIn('id', $listIdStores)
                ->paging($perPage, $pageNumber);

        } else {

            $stores = Store::select('stores.*', 'prices.price', 'products.name as product_name')
                            ->whereIn('stores.id', $listIdStores)
                            ->join('prices', 'stores.id', '=', 'prices.store_id')
                            ->join('products', 'products.id', '=', 'prices.product_id')
                            ->orderby("prices.price", "asc")
                            ->whereIn('products.id', $arrProductId)
                            ->paging($perPage, $pageNumber);
        }
        

        foreach ($stores["data"] as $key => $value) {
            $value->photo = json_decode($value->photo);
        }

        return $stores;
    }

    public function is_subset(array $subset, array $set): bool {
        return (bool)!array_diff($subset, $set);
   }
}
