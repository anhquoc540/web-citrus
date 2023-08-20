<?php

namespace App\Http\Services\Base\Disease;

use App\Models\Disease;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
use AlException;

class DiseaseService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        $data = $request->input();
        return Disease::create($data);
    }

    public function getList()
    {
        return Disease::all();
    }

    public function getDetail($id)
    {
        $disease = Disease::find($id);
        if(!$disease) {
            $al = AlException::withMessages([
                'find_dis' => [trans('messages.DISEASE_006', ['attribute' => $id])],
            ]);
            $al->status('DISEASE_006');
            throw $al;
        }
        $disease->photo = json_decode($disease->photo);
        $disease->therapy;

        return $disease;
    }

    public function getDetailByName($name)
    {
        $disease = Disease::where('name', $name)->first();

        if(!$disease) {
            $al = AlException::withMessages([
                'find_dis' => [trans('messages.DISEASE_005', ['attribute' => $name])],
            ]);
            $al->status('DISEASE_005');
            throw $al;
        }
        $disease->photo = json_decode($disease->photo);
        $disease->therapy;

        $products = [];

        foreach ($disease->therapy as $key => $value) {
            if(count($value->product) > 0) {
                foreach ($value->product as $k => $v) {
                    $v->photo = json_decode($v->photo);
                }
                $products = array_merge($products, $value->product->toArray());
            }
        }

        $disease->products = $products;

        return $disease;
    }

    public function updated($request, $id)
    {
        $disease = Disease::find($id);
        if(!$disease) {
            $al = AlException::withMessages([
                'find_dis' => [trans('messages.DISEASE_001', ['attribute' => $id])],
            ]);
            $al->status('DISEASE_001');
            throw $al;
        }

        $input = $request->input();
        $disease->update($input);

        return $disease;
    }

    public function destroy($id)
    {
        $disease = Disease::find($id);
        if($disease) {
            $disease->delete();
            return true;
        }

        $al = AlException::withMessages([
            'delete_dis' => [trans('messages.DISEASE_001', ['attribute' => $id])],
        ]);
        $al->status('DISEASE_001');
        throw $al;
    }
}
