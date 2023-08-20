<?php

namespace App\Http\Services\Base\User;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
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
        $user = User::find($id);
        if(!$user) {
            $user = Auth::user();
        }
        $user->address;
        
        return $user;
    }

    public function updated($request)
    {
        $user = Auth::user();
        if(!$user) {
            $al = AlException::withMessages([
                'find_user' => [trans('messages.USER_002', ['attribute' => $id])],
            ]);
            $al->status('USER_002');
            throw $al;
        }

        $input = $request->input();
        $user->update($input);

        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            $user->delete();
            return true;
        }

        $al = AlException::withMessages([
            'delete_user' => [trans('messages.USER_002', ['attribute' => $id])],
        ]);
        $al->status('USER_002');
        throw $al;
    }
}
