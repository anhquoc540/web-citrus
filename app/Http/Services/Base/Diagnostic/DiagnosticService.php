<?php

namespace App\Http\Services\Base\Diagnostic;

use App\Models\Disease;
use App\Models\Diagnostic;
use App\Http\Services\Base\Custom\QueryCustom;
use Illuminate\Support\Facades\Auth;
use AlException;

class DiagnosticService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function getList($perPage, $pageNumber)
    {
        $list = Diagnostic::where('user_id', Auth::user()->id)->paging($perPage, $pageNumber);
        
        foreach ($list['data'] as $key => $value) {
            $value->image = json_decode($value->image);
            $value->user;
            $value->diseases;
        }

        return $list;
    }

    public function create($request)
    {
        $data = $request->input();
        $disease = Disease::where('name', $data['disease_name'])->first();

        if(!$disease) {
            $al = AlException::withMessages([
                'error' => [trans('messages_mb.DIAGNOSTIC_001')],
            ]);
            $al->status('DIAGNOSTIC_001');
            throw $al;
        }
        
        $data['image'] = json_encode($data['image']);
        $data['user_id'] = Auth::user()->id;
        $data['dis_id'] = $disease->id;
        

        $diagnostic = Diagnostic::create($data);
        $diagnostic->image = json_decode($diagnostic->image);
        $diagnostic->user;
        $diagnostic->diseases;

        return $diagnostic;
    }

    public function getDetail($id)
    {
        $diagnostic = Diagnostic::find($id);
        if($diagnostic) {
            $diagnostic->image = json_decode($diagnostic->image);
            $diagnostic->user;
            $diagnostic->diseases;
        }

        return $diagnostic;
    }
}
