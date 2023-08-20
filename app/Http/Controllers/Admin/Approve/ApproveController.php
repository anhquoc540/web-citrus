<?php

namespace App\Http\Controllers\Admin\Approve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Approve\ApproveService;

class ApproveController extends Controller
{
    //

    protected $approve;
    public function __construct(ApproveService $approve)
    {
        $this->approve = $approve;
    }

    public function list()
    {
        try {
            $list = $this->approve->listExpertRegister();
            return view('admin.approve.list', ['list' => $list, 'title' => 'Danh Sách Đăng Kí Cửa Hàng']);
        } catch (Exception $e) {
            Session::flash('error', $th->getMessage());
            return false;
        }
        
    }

    public function show($id)
    {
        $result = $this->approve->getById($id);
        return view('admin.approve.edit', ['title' => 'Chi Tiết Duyệt Cửa Hàng', 'data' => $result]);
    }

    public function update(Request $request, $id)
    {
        $result = $this->approve->update($request, $id);
        if($result) {
            return response()->json([
                'error' => false,
                'data' => $result,
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function destroy($id)
    {
        $result = $this->approve->destroy($id);

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
