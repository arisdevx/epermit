<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCheckRequest extends FormRequest
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
        $validate['citizencheck'] = 'required';

        if($this->citizencheck == '1')
        {
            $validate['usernamecheck'] = 'required|numeric|digits:12|unique:users,username';
        }
        else
        {
            $validate['usernamecheck'] = 'required|unique:users,username';
        }

        return $validate;
    }

    public function messages()
    {
        $validate['usernamecheck.unique'] = 'No kad pengenalan yang dimasukan telah diguna. <br><i>The identity card no your entered already taken.</i>';
        $validate['usernamecheck.numeric'] = 'No Kad Pengenalan / Passport yang dimasukan tidak sah <br><i>The identity card number must be numeric<i>';
        
        if($this->citizencheck == '1')
        {
            $validate['usernamecheck.digits'] = 'The username must be between 12 characters';
        }

        return $validate;
    }
}
