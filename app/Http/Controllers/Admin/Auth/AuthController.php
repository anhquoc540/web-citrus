<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Services\Admin\Auth\AuthService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    // post form login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            if(Auth::user()->role_id == 1) {
                return redirect()->route('admin');
            }
            return redirect()->route('expert');
        }

        return redirect()->back()->withErrors(trans('messages.LOGIN_004'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    // get register
    public function register()
    {
        return view('auth.register', ['title' => 'Đăng kí']);
    }

    public function createExpert(Request $request)
    {
        $result = $this->auth->created($request);
        if($result) {
            return redirect()->route('register-info', ['userId' => $result->id]);
        }
        
        return redirect()->route('register');
    }

    public function registerInfo(Request $request)
    {
        return view('auth.register-info', ['title' => 'Đăng kí', 'userId' => $request->userId]);
    }

    public function updateUserRegister(Request $request)
    {
        $result = $this->auth->updateUserRegister($request);
        if($result) {
            return redirect()->route('register-store', ['userId' => $result->id]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function registerStore(Request $request)
    {
        return view('auth.register-store', ['title' => 'Đăng kí cửa hàng', 'userId' => $request->userId]);
    }

    public function createStore(Request $request)
    {
        $result = $this->auth->createStore($request);
        if($result) {
            return redirect()->route('expert');
        }

        return response()->json([
            'error' => true
        ]);
    }
    
}
