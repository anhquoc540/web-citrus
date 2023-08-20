<?php

namespace App\Http\Services\Base\Address;

use App\Models\Address;
use App\Http\Services\Base\Custom\QueryCustom;
use Illuminate\Support\Facades\Auth;

class AddressService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    // get list address of user login
    public function getList($perPage, $pageNumber)
    {
        $list = Address::where('user_id', Auth::user()->id)->paging($perPage, $pageNumber);
        foreach ($list['data'] as $key => $value) {
            $value->user;
        }
        
        return $list;
    }

    public function create($request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;

        $address = Address::create($data);

        return $address;
    }

    public function delete($id)
    {
        $address = Address::find($id);
        if($address) {
            $address->delete();
        }

        return true;
    }
}
