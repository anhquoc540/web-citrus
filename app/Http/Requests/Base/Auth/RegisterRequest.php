<?php

namespace App\Http\Requests\Base\Auth;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|min:10|max:15',
            'password' => 'required|min:3|max:255',
        ];
    }
}
