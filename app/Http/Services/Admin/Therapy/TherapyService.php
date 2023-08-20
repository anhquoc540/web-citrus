<?php

namespace App\Http\Services\Admin\Therapy;

use App\Models\Disease;
use App\Models\Therapy;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Custom\QueryCustom;

class TherapyService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        try {
            $data = $request->input();
            // $data['slug'] = Str::of($data['name'])->slug('-');
            Therapy::create($data);

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
        return Therapy::all();
    }

    public function destroy($r)
    {
        $id = $r->id;
        $therapy = Therapy::find($id);

        if($therapy) {
            // find and delete relationships
            Product::where('therapy_id', $id)->delete();
            return Therapy::where('id', $id)->delete();
        }

        return false;
    }

    public function update($request, $id)
    {
        try {
            $therapy = Therapy::find($id);
            $therapy->fill($request->input());
            $therapy->save();

            Session::flash('success', trans('response.update'));
            return true;

        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return false;
        }
        
    }
}
