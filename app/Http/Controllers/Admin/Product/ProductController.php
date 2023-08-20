<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Product\ProductService;
use App\Http\Services\Admin\Therapy\TherapyService;
use Exception;
use App\Models\Product;
use App\Http\Requests\Admin\Product\RequestUpdate;

class ProductController extends Controller
{
    protected $product;
    protected $therapy;
    public function __construct(ProductService $product, TherapyService $therapy)
    {
        $this->product = $product;
        $this->therapy = $therapy;
    }
    
    public function create()
    {
        $listThe = $this->therapy->getAll();
        return view('admin.product.add', [
            'title' => trans('title.TITLE_009'),
            'listThe' => $listThe
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->product->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.product.list', [
            'title' => trans('title.TITLE_012'),
            'list' => $this->product->getAll()
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', [
            'title' => trans('title.TITLE_006'),
            'product' => $product,
            'listThe' => $this->therapy->getAll()
        ]);
    }

    public function update($id, RequestUpdate $request) 
    {
        $this->product->update($request, $id);

        return redirect('/admin/products/list');
    }

    public function destroy(Request $requests)
    {
        $result = $this->product->destroy($requests);

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
}
