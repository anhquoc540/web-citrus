<?php

namespace App\Http\Services\Base\Role;

use App\Models\Role;
use Illuminate\Support\Str;
use App\Http\Services\Base\Custom\QueryCustom;
use AlException;

class RoleService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function create($request)
    {
        $data = $request->input();
        return Role::create($data);
    }

    public function getList()
    {
        return Role::all();
    }

    public function getDetail($id)
    {
        $role = Role::find($id);
        if(!$role) {
            $al = AlException::withMessages([
                'find_role' => [trans('messages.ROLE_001', ['attribute' => $id])],
            ]);
            $al->status('ROLE_001');
            throw $al;
        }
        return $role;
    }

    public function updated($request, $id)
    {
        $role = Role::find($id);
        if(!$role) {
            $al = AlException::withMessages([
                'find_role' => [trans('messages.ROLE_001', ['attribute' => $id])],
            ]);
            $al->status('ROLE_001');
            throw $al;
        }

        $input = $request->input();
        $role->update($input);

        return $role;
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if($role) {
            $role->delete();
            return true;
        }

        $al = AlException::withMessages([
            'delete_role' => [trans('messages.ROLE_001', ['attribute' => $id])],
        ]);
        $al->status('ROLE_001');
        throw $al;
    }
}
