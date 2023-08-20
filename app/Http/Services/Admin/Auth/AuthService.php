<?php
namespace App\Http\Services\Admin\Auth;

use App\Models\User;
use App\Models\Store;
use App\Http\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use AlException;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Custom\QueryCustom;
use App\Http\Services\Custom\FileService;

class AuthService extends BaseService
{

    /**
     * Create a new AuthService instance
     *
     * @param User $user
     *
     */
    protected $queryCustom;
    protected $file;
    public function __construct(QueryCustom $queryCustom, FileService $file)
    {
        $this->queryCustom = $queryCustom;
        $this->file = $file;
    }

    public function created($request)
    {
        try {
            $data = $request->input();
            $checkPhone = User::where('phone', $data['phone'])->where('lg_mobile', 2)->first();
            if($checkPhone) {
                Session::flash('error', 'Số điện thoại đã được đăng kí');
                return false;
            }
            $checkEmail = User::where('email', $data['email'])->where('lg_mobile', 2)->first();
            if($checkEmail) {
                Session::flash('error', 'Địa chỉ email đã được đăng kí');
                return false;
            }
            
            $data['status'] = 0; // chua active
            $data['address_id'] = null;
            $data['lg_mobile'] = 2;
            $data['role_id'] = 2;
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            if($user) {
                $credentials = $request->only('email', 'password');
                Auth::attempt($credentials);
            }
            // Session::flash('success', trans('response.DISEASE_001'));
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', $th->getMessage());

            return false;
        }

        return $user;
    }

    public function updateUserRegister($request)
    {
        try {
           $cdmt = $this->file->UploadedFile($request->cccdmt);
           $cdms = $this->file->UploadedFile($request->cccdms);

            $user = User::find($request->user_id);
            $user->cccdmt = json_encode($cdmt);
            $user->cccdms = json_encode($cdms);

            $user->save();

            // Session::flash('success', trans('response.DISEASE_001'));
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', $th->getMessage());

            return false;
        }

        return $user;
    }

    public function createStore($request)
    {
        try {
            $data = $request->input();

            $storePhoto = $this->file->UploadedFile($request->storephoto);
            $certificate1 = $this->file->UploadedFile($request->certificate1);
            $certificate2 = $this->file->UploadedFile($request->certificate2);
            $data['photo'] = json_encode($storePhoto);
            $data['certificate1'] = json_encode($certificate1);
            $data['certificate2'] = json_encode($certificate2);
            $data['status'] = 1;

            $store = Store::create($data);

            // Session::flash('success', trans('response.DISEASE_001'));
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', $th->getMessage());

            return false;
        }

        return $store;
    }
    
}
