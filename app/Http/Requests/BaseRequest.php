<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // use for api
    public function failedResponse($input, $errors, $validator)
    {
        $message = "";
        $code = 422;
        foreach ($errors as $value) {
            $arrValue = explode("__", $value[0]);
            if(count($arrValue) > 1) {
                $code = $arrValue[0];
                $message = $arrValue[1];
            } else {
                $message = $value[0];
            }
        }

        $errorsData = [
            'status' => false,
            'code' => $code,
            'message' => $message,
            'pagination' => null,
            'data' => null,
            'errors' => $errors,
        ];

        throw new HttpResponseException(response()->json($errorsData, 422));
        
    }

    // use for api
    public function failedValidation(Validator $validator)
    {
        $ex = new ValidationException($validator);
        $errors = $ex->errors();

        $input = $validator->attributes();

        $this->failedResponse($input, $errors, $validator);
    }

    // use for web
    // public function failedValidation(Validator $validator)
    // {
    //     throw (new ValidationException($validator))
    //                 ->errorBag($this->errorBag)
    //                 ->redirectTo($this->getRedirectUrl());
    // }
}
