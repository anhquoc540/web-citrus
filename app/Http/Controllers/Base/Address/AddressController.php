<?php

namespace App\Http\Controllers\Base\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Address\AddressService;

class AddressController extends Controller
{
    //
    protected $address;
    public function __construct(AddressService $address)
    {
        $this->address = $address;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;

            $result = $this->address->getList($perPage, $pageNumber);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->address->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function delete($id)
    {
        try {
            $result = $this->address->delete($id);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
