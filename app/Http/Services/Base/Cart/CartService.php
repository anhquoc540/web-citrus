<?php

namespace App\Http\Services\Base\Cart;

use App\Models\Cart;
use App\Models\Price;
use App\Http\Services\Base\Custom\QueryCustom;
use Illuminate\Support\Facades\Auth;
use AlException;

class CartService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function getList($perPage, $pageNumber)
    {
        $list = Cart::select('carts.id', 'carts.qty', 'products.name as product_name', 'products.id as product_id', 'stores.name as store_name', 'stores.id as store_id', 'prices.price')
                        ->where('carts.user_id', Auth::user()->id)
                        ->join('prices', 'prices.id', '=', 'carts.price_id')
                        ->join('products', 'products.id', '=', 'prices.product_id')
                        ->join('stores', 'stores.id', '=', 'prices.store_id')
                        ->get();

        return $list;
    }

    public function create($request)
    {
        $data = $request->input();
        $price = Price::where('store_id', $data['store_id'])->where('product_id', $data['product_id'])->first();

        if(!$price) {
            $al = AlException::withMessages([
                'error' => [trans('messages_mb.CART_001')],
            ]);
            $al->status('CART_001');
            throw $al;
        }
        
        Cart::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'price_id' =>  $price->id
            ],
            [
                'qty' => $data['qty'],
            ]
        );

        return true;
    }

    // remove products carts
    public function delete($listId)
    {
        $arrId = explode(",", $listId);
        foreach ($arrId as $key => $id) {
            Cart::where('id', $id)->delete();
        }

        return true;
    }
}
