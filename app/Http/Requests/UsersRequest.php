<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // always should be true to activate this request
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

            'name'=> 'required',
            'password'=> 'required',
            'email'=> 'required',
            'role_id'=> 'required',
            'is_active'=> 'required'

            //
        ];
    }
}
