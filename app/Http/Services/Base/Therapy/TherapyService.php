<?php

namespace App\Http\Services\Base\Therapy;

use App\Models\Therapy;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
use AlException;

class TherapyService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        $data = $request->input();
        return Therapy::create($data);
    }

    public function getList()
    {
        return Therapy::all();
    }

    public function getDetail($id)
    {
        $therapy = Therapy::find($id);
        if(!$therapy) {
            $al = AlException::withMessages([
                'find_stages' => [trans('messages.THERAPY_001', ['attribute' => $id])],
            ]);
            $al->status('THERAPY_001');
            throw $al;
        }
        $therapy->product;
        
        return $therapy;
    }

    public function updated($request, $id)
    {
        $therapy = Therapy::find($id);
        if(!$therapy) {
            $al = AlException::withMessages([
                'find_stages' => [trans('messages.THERAPY_001', ['attribute' => $id])],
            ]);
            $al->status('THERAPY_001');
            throw $al;
        }

        $input = $request->input();
        $therapy->update($input);

        return $therapy;
    }

    public function destroy($id)
    {
        $therapy = Therapy::find($id);
        if($therapy) {
            $therapy->delete();
            return true;
        }

        $al = AlException::withMessages([
            'delete_therapy' => [trans('messages.THERAPY_001', ['attribute' => $id])],
        ]);
        $al->status('THERAPY_001');
        throw $al;
    }
}
