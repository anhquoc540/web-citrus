<?php

namespace App\Http\Services\Admin\Approve;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use Illuminate\Support\Facades\Auth;

class ApproveService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function listExpertRegister()
    {
        $list = User::where('role_id', 2)
                    ->where('status', 0)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return $list;
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function update($request, $id)
    {
        $expert = User::find($id);
        if($request->status == 0) {
            $expert->status = 1;
            $expert->save();
        }
        
        return $expert;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            $user->delete();
            return true;
        }
        return false;
    }
    
}
