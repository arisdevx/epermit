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
        return [
            'usernamecheck.numeric' => 'No Kad Pengenalan / Passport yang dimasukan tidak sah',
        ];
    }
}
