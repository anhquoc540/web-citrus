<?php
namespace App\Http\Services\Base\Auth;

use App\Models\User;
use App\Models\UserOtp;
use App\Http\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use AlException;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{

    /**
     * Create a new AuthService instance
     *
     * @param User $user
     *
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($credentials, $remember)
    {
        $user = $this->user->where('phone', $credentials['phone'])->first();

        if(!$user || $user->lg_mobile != 1) {
            $al = AlException::withMessages([
                'error_login' => [trans('messages_mb.LOGIN_005')],
            ]);
            $al->status('LOGIN_005');
            throw $al;
        }

        if($user->status != 1) {
            $al = AlException::withMessages([
                'error_login' => [trans('messages_mb.LOGIN_004')],
            ]);
            $al->status('LOGIN_004');
            throw $al;
        }

        if (Auth::attempt($credentials, $remember)) {
            $user->role;
            return [
                'token' => $user->createToken('authTokens')->plainTextToken,
                'expiration' => config('sanctum.expiration'),
                'data' => $user,
            ];
        }

        $al = AlException::withMessages([
            'error_login' => [trans('messages_mb.LOGIN_003')],
        ]);
        $al->status('LOGIN_003');
        throw $al;

    }

    public function logout($user) {
        return $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }

    public function register($request)
    {
        $checkUser = $this->user->where('phone', $request['phone'])->first();
        if($checkUser) {
            if($checkUser->status == 0) {
                $al = AlException::withMessages([
                    'error_register' => [trans('messages_mb.USER_003')],
                ]);
                $al->status('USER_003');
                throw $al;
            } else {
                $al = AlException::withMessages([
                    'error_register' => [trans('messages_mb.USER_001')],
                ]);
                $al->status('USER_001');
                throw $al;
            }
        }

        $data = [
            'email' => $request['phone'] . 'example@gmail.com',
            'phone' => $request['phone'],
            'status' => 0,
            'lg_mobile' => 1,
            'role_id' => 3,
            'password' => Hash::make($request['password'])
        ];

        $user = User::create($data);

        $otp = $this->generalOtp($request['phone']);
        if ($otp instanceof Exception) {
            $al = AlException::withMessages([
                'error_register' => [trans('messages_mb.USER_002', ['attribute' => $request['phone']])],
            ]);
            $al->status('USER_002');
            throw $al;
        }
        
        if($otp) {
            // set thoi gian hieu luc cua OTP la 1 phut
            $now = now();
            $newDate = date('Y-m-d H:i:s', strtotime($now. ' +1 minutes'));

            UserOtp::create(
                ['user_id' => $user->id, 'otp' => $otp, 'expire_at' => $newDate]
            );
        }

        return $user;
    }

    public function verify($request)
    {
        $userOtp = UserOtp::where('user_id', $request['user_id'])->where('otp', $request['otp'])->first();

        $now = now();
        if(!$userOtp) {
            $al = AlException::withMessages([
                'error_verify' => [trans('messages_mb.USER_004')],
            ]);
            $al->status('USER_004');
            throw $al;
        } else if($userOtp && $now->isAfter($userOtp->expire_at)) {
            $al = AlException::withMessages([
                'error_verify' => [trans('messages_mb.USER_005')],
            ]);
            $al->status('USER_005');
            throw $al;
        }

        $user = User::find($request['user_id']);
        if($user) {
            $userOtp->update([
                'expire_at' => now()
            ]);

            $user->update([
                'status' => 1
            ]);

            return $user;
        }

        $al = AlException::withMessages([
            'error_verify' => [trans('messages_mb.USER_004')],
        ]);
        $al->status('USER_004');
        throw $al;
    }

    public function sendSms($phoneNumber)
    {
        $now = now();
        $newDate = date('Y-m-d H:i:s', strtotime($now. ' +1 minutes'));
  
        $user = User::where('phone', $phoneNumber)->first();
        if(!$user) {
            $al = AlException::withMessages([
                'error_register' => [trans('messages_mb.USER_001')],
            ]);
            $al->status('USER_001');
            throw $al;
        }

        $otp = $this->generalOtp($phoneNumber);
        if ($otp instanceof Exception) {
            $al = AlException::withMessages([
                'error_register' => [trans('messages_mb.USER_002', ['attribute' => $phoneNumber])],
            ]);
            $al->status('USER_002');
            throw $al;
        }

        $userOtp = UserOtp::where('user_id', $user->id)->first();
        $userOtp->update([
            'otp' => $otp,
            'expire_at' => $newDate
        ]);

        return ['user_id' => $user->id, 'otp' => $otp];
    }

    public function resetPassword($request)
    {
        return User::where('id', $request['user_id'])->update(['password'=>Hash::make($request['password'])]);
    }

    public function generalOtp($phoneNumber)
    {
        // Quoc
        // $receiverNumber = "+840939889963";

        // Vu
        // $receiverNumber = "+840379701816";
        
        // Van
        // $receiverNumber = "+84" . "0329301425";
        // $receiverNumber = "+840921635678";

        // Sang
        $receiverNumber = "+840393872942";

        $otp = rand(1000, 9999);
        $message = "Mã OPT của bạn là: " . $otp;
  
        try {
            $twilio = config('services.twilio');
            $account_sid = $twilio['sid'];
            $auth_token = $twilio['token'];
            $twilio_number = $twilio['number'];
  
            $client = new Client($account_sid, $auth_token);

            $client->messages->create(
                $receiverNumber,
                [
                    'from' => $twilio_number, 
                    'body' => $message
                ]
            );
  
            return $otp;
  
        } catch (Exception $e) {
            return $e;
        }
    }
}
