<?php

namespace App\Http\Requests\Base\Auth;

use App\Http\Requests\BaseRequest;

class ForgotRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
        ];
    }
}
