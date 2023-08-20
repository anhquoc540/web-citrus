<?php

namespace App\Http\Services\Admin\Product;

use App\Models\Disease;
use App\Models\Therapy;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Custom\QueryCustom;
use App\Http\Services\Custom\FileService;

class ProductService
{
    protected $queryCustom;
    protected $file;
    public function __construct(QueryCustom $queryCustom, FileService $file)
    {
        $this->queryCustom = $queryCustom;
        $this->file = $file;
    }

    public function create($request)
    {
        try {
            $data = $request->input();
            $photo = $this->file->UploadedFile($request->photos);
            $data['photo'] = json_encode($photo);
            
            Product::create($data);

            Session::flash('success', trans('response.create'));
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', $th->getMessage());

            return false;
        }

        return true;
    }

    public function getAll()
    {
        return Product::all();
    }

    public function destroy($r)
    {
        $id = $r->id;
        $product = Product::find($id);

        if($product) {
            $product->delete();
            
            return true;
        }

        return false;
    }

    public function update($request, $id)
    {
        try {
            $photo = $this->file->UploadedFile($request->photos);

            $product = Product::find($id);
            $product->fill($request->input());
            $product->photo = json_encode($photo);
            $product->save();

            Session::flash('success', trans('response.update'));
            return true;

        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return false;
        }
        
    }
}
