<?php

namespace App\Http\Services\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        $data = $request->input();
        return User::create($data);
    }

    public function getList()
    {
        return User::all();
    }

    public function getDetail($id)
    {
        return User::find($id);
    }

    public function updated($r, $id)
    {
        $user = User::find($id);
        $data = $r->all();
        // unset($data['_token']);
        // unset($data['phone']);
        // unset($data['email']);
        if($user) {
            $user->update($data);

            return true;
        }

        return false;
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
