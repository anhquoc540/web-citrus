<?php

namespace App\Http\Controllers\Base\Diagnostic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Diagnostic\DiagnosticService;
use Exception;

class DiagnosticController extends Controller
{
    //
    protected $diagnostic;
    public function __construct(DiagnosticService $diagnostic)
    {
        $this->diagnostic = $diagnostic;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;

            $result = $this->diagnostic->getList($perPage, $pageNumber);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->diagnostic->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function detail($id)
    {
        try {
            $result = $this->diagnostic->getDetail($id);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
