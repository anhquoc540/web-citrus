<?php

namespace App\Http\Controllers\Base\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\User\UserService;
use Exception;
use App\Models\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function detail(Request $request)
    {
        //
        try {
            $result = $this->user->getDetail($request->id);
            return $this->sendSuccessData($result, "get detail success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function update(Request $request)
    {
        //
        try {
            $result = $this->user->updated($request);
            return $this->sendSuccessData($result, "update success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    
}
