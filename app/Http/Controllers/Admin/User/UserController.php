<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\User\UserService;
use Exception;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        //
        try {
            $result = $this->user->getList();
            return view('admin.user.list', ['title' => 'Danh sách người dùng', 'list' => $result]);
        } catch (Exception $e) {
            Session::flash('error', $th->getMessage());
            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        //
        try {
            $result = $this->user->getDetail($id);
            if(!$result) {
                Session::flash('error', 'Không tìm thấy người dùng có id là ' . $id);
                return false;
            }
            if($result->role_id == 3 || $result->role_id == 1) {
                return view('admin.user.edit-mb', ['title' => 'Cập nhập người dùng', 'data' => $result]);
            }
            return view('admin.user.edit', ['title' => 'Cập nhập người dùng', 'data' => $result]);
        } catch (Exception $e) {
            Session::flash('error', $th->getMessage());
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $result = $this->user->updated($request, $id);
        
        if($result) {
            return response()->json([
                'error' => false,
                'message' => trans('response.update'),
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = $this->user->destroy($id);

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
