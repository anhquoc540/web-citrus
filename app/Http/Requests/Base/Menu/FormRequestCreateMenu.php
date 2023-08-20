<?php

namespace App\Http\Requests\Admin\Menu;

use App\Http\Requests\BaseRequest;

class FormRequestCreateMenu extends BaseRequest
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
            'name.required' => trans('messages.MENU_001'),
        ];
    }
}
