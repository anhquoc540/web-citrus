<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Store\StoreService;


class StoreController extends Controller
{
    protected $store;
    public function __construct(StoreService $store)
    {
        $this->store = $store;
    }

    //
    public function listProducts()
    {
        $listProductStore = $this->store->listProductStore();
        return view('expert.store.list-product', [
            'title' => 'Danh sách thuốc của cửa hàng',
            'list' => $listProductStore
        ]);
    }

    public function listProductImport()
    {
        $result = $this->store->listProductImport();
        return response()->json([
            'data' => $result,
            'error' => false
        ]);
    }

    public function importProductStore(Request $request)
    {
        $result = $this->store->importProductStore($request);

        return response()->json([
            'data' => $result,
            'error' => false
        ]);
    }

    public function destroy(Request $requests)
    {
        $result = $this->store->destroy($requests);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => trans('response.delete'),
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function detail(Request $requests)
    {
        $result = $this->store->detail($requests);

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
        $result = $this->store->update($requests);
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

    public function storeManager()
    {
        return view('expert.store.index', [
            'title' => 'Quản lý cửa hàng'
        ]);
    }
}
