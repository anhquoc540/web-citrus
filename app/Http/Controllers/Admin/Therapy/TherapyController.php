<?php

namespace App\Http\Controllers\Admin\Therapy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Therapy\TherapyService;
use App\Http\Services\Admin\Disease\DiseaseService;
use Exception;
use App\Models\Therapy;
use App\Http\Requests\Admin\Therapy\RequestUpdate;

class TherapyController extends Controller
{
    protected $therapy;
    protected $disease;
    public function __construct(TherapyService $therapy, DiseaseService $disease)
    {
        $this->therapy = $therapy;
        $this->disease = $disease;
    }

    public function create()
    {
        $listDis = $this->disease->getAll();
        return view('admin.therapy.add', [
            'title' => trans('title.TITLE_005'),
            'listDis' => $listDis
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->therapy->create($request);

        return redirect()->back();
    }

    public function list()
    {
        return view('admin.therapy.list', [
            'title' => trans('title.TITLE_008'),
            'list' => $this->therapy->getAll()
        ]);
    }

    public function show($id)
    {
        $therapy = Therapy::find($id);
        return view('admin.therapy.edit', [
            'title' => trans('title.TITLE_006'),
            'therapy' => $therapy,
            'listDis' => $this->disease->getAll()
        ]);
    }

    public function update($id, RequestUpdate $request) 
    {
        $this->therapy->update($request, $id);

        return redirect('/admin/therapies/list');
    }

    public function destroy(Request $requests)
    {
        $result = $this->therapy->destroy($requests);

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
