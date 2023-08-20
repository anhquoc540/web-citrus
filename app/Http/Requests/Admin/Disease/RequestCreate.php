<?php

namespace App\Http\Requests\Admin\Disease;

use App\Http\Requests\BaseRequest;

class RequestCreate extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('messages.DISEASE_001'),
        ];
    }
}
