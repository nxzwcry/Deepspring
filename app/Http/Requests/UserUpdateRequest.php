<?php

namespace Someline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Entrust;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        if (Entrust::can('create-user'))
//            return true;
//        else
//            return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
