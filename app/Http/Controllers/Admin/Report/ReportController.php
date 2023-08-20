<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Report\ReportService;

class ReportController extends Controller
{
    //
    protected $report;
    public function __construct(ReportService $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        if($request->from_to) {
            $fromTo = $request->from_to;
        } else {
            $fromTo = date('m/d/Y') . ' - ' . date('m/d/Y');
        }
       
        $result = $this->report->getByDate($fromTo);
        return view('expert.report.index', ['title' => 'Báo Cáo', 'data' => $result, 'fromTo' => $fromTo]);
    }

    public function getByDate(Request $request)
    {
        return redirect()->route('reports', ['from_to' => $request->from_to]);

    }

}
