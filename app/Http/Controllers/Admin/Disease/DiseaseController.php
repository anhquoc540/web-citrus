<?php

namespace App\Http\Controllers\Admin\Disease;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Disease\DiseaseService;
use Exception;
use App\Models\Disease;
use App\Http\Requests\Admin\Disease\RequestCreate;
use App\Http\Requests\Admin\Disease\RequestUpdate;


class DiseaseController extends Controller
{
    protected $disease;
    public function __construct(DiseaseService $disease)
    {
        $this->disease = $disease;
    }

    public function create()
    {
        return view('admin.disease.add', [
            'title' => trans('title.TITLE_001')
        ]);
    }

    public function store(RequestCreate $request)
    {
        $result = $this->disease->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.disease.list', [
            'title' => trans('title.TITLE_004'),
            'list' => $this->disease->getAll()
        ]);
    }

    public function show(Disease $disease)
    {
        return view('admin.disease.edit', [
            'title' => trans('title.TITLE_002'),
            'disease' => $disease
        ]);
    }

    public function update(Disease $disease, RequestUpdate $request) 
    {
        $this->disease->update($request, $disease);

        return redirect('/admin/diseases/list');
    }

    public function destroy(Request $requests)
    {
        $result = $this->disease->destroy($requests);

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
