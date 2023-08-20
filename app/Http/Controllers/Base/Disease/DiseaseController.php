<?php

namespace App\Http\Controllers\Base\Disease;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Disease\DiseaseService;
use Exception;

class DiseaseController extends Controller
{
    protected $disease;
    public function __construct(DiseaseService $disease)
    {
        $this->disease = $disease;
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        //
        try {
            $result = $this->disease->getList();
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $result = $this->disease->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id)
    {
        //
        try {
            $result = $this->disease->getDetail($id);
            return $this->sendSuccessData($result, "get detail success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function getDetailByName(Request $request)
    {
        //
        try {
            $result = $this->disease->getDetailByName($request->name);
            return $this->sendSuccessData($result, "get detail success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $result = $this->disease->updated($request, $id);
            return $this->sendSuccessData($result, "update success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $result = $this->disease->destroy($id);
            return $this->sendSuccessData($result, "delete success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
