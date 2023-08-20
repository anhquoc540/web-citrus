<?php

namespace App\Http\Services\Admin\Disease;

use App\Models\Disease;
use App\Models\Therapy;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Custom\QueryCustom;
use App\Http\Services\Custom\FileService;

class DiseaseService
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

            Disease::create($data);

            Session::flash('success', trans('response.DISEASE_001'));
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', $th->getMessage());

            return false;
        }

        return true;
    }

    public function getAll()
    {
        $list = Disease::all();
        foreach ($list as $key => $value) {
            $value->photo = json_decode($value->photo);
        }

        return $list;
    }

    public function destroy($r)
    {
        $id = $r->id;
        $disease = Disease::find($id);

        if($disease) {
            
            // find and delete relationships
            $listIdThr = Therapy::where('dis_id', $id)->pluck('id')->toArray();
            if(count($listIdThr) > 0) {
                Product::whereIn('therapy_id', $listIdThr)->delete();
                Therapy::where('dis_id', $id)->delete();
            }
            
            return Disease::where('id', $id)->delete();
        }

        return false;
    }

    public function update($request, $disease)
    {
        try {
            $photo = $this->file->UploadedFile($request->photos);
            
            $disease->fill($request->input());
            $disease->photo = json_encode($photo);
            $disease->save();

            Session::flash('success', trans('response.update'));
            return true;

        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return false;
        }
        
    }
}
