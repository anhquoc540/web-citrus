<?php

namespace App\Http\Controllers\Base\Therapy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Therapy\TherapyService;
use Exception;

class TherapyController extends Controller
{
    protected $therapy;
    public function __construct(TherapyService $therapy)
    {
        $this->therapy = $therapy;
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        //
        try {
            $result = $this->therapy->getList();
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
            $result = $this->therapy->create($request);
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
            $result = $this->therapy->getDetail($id);
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
            $result = $this->therapy->updated($request, $id);
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
            $result = $this->therapy->destroy($id);
            return $this->sendSuccessData($result, "delete success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
