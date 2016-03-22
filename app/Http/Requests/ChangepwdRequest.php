<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangepwdRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'password'=>'exists:users,password',
            'again_password' =>'same:new_password',
        ];
    }
}
