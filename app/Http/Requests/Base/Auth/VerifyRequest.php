<?php

namespace App\Http\Requests\Base\Auth;

use App\Http\Requests\BaseRequest;

class VerifyRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'otp' => 'required',
        ];
    }
}
