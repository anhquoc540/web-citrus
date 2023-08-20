<?php

namespace App\Http\Controllers\Base\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Base\Auth\LoginRequest;
use App\Http\Requests\Base\Auth\RegisterRequest;
use App\Http\Requests\Base\Auth\VerifyRequest;
use App\Http\Requests\Base\Auth\ForgotRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Base\Auth\AuthService;
use App\Notifications\SendSmsNotification;
use Exception;
use Illuminate\Http\Request;
Use DB;

class AuthController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $this->auth->login($request->only('phone', 'password'), $request->remember);
            return $this->authenticateSuccess($data['data'], $data['token'], $data['expiration']);
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function logout()
    {
        try {
            $data = $this->auth->logout(Auth::user());
            return $this->sendSuccessData($data, trans('response.logout'));
        } catch (Exception $e) {
            return $this->sendErrorData("Logout false", 403);
        }
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $this->auth->register($request->only('phone', 'password'));
            DB::commit();
            
            return $this->sendSuccessData($data, trans('response.create'));

        } catch (Exception $e) {
            DB::rollback();
            return $this->exceptions($e);
        }
    }

    public function verify(VerifyRequest $request)
    {
        try {
            $data = $this->auth->verify($request->only('user_id', 'otp'));
            return $this->sendSuccessData($data, trans('response.verify'));
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function sendSms(Request $request)
    {
        $phoneNumber = $request->phone;
        try {
            $data = $this->auth->sendSms($phoneNumber);
            return $this->sendSuccessData($data);
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function forgotPassword(ForgotRequest $request)
    {
        try {
            $data = $this->auth->resetPassword($request->only('password', 'user_id'));
            return $this->sendSuccessData($data, trans('response.reset_password'));
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }


}
