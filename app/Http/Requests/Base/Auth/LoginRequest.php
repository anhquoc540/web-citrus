<?php

namespace App\Http\Requests\Base\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required',
            'password' => 'required',
        ];
    }

    // use for api
    // public function messages(): array
    // {
    //     return [
    //         'email.required' => 'LOGIN_001__' . trans('messages.LOGIN_001'),
    //     ];
    // }

    public function messages(): array
    {
        return [
            'phone.required' => trans('messages.LOGIN_001'),
            'password.required' => trans('messages.LOGIN_002'),
        ];
    }
}
