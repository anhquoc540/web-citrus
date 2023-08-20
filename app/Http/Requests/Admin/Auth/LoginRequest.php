<?php

namespace App\Http\Requests\Admin\Auth;

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
            'email' => 'required|email:rfc,dns',
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
            'email.required' => trans('messages.LOGIN_001'),
            'email.email' => trans('messages.LOGIN_002'),
            'password.required' => trans('messages.LOGIN_003'),
        ];
    }
}
