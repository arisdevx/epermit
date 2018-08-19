<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAccountRequest extends FormRequest
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
        $validate['citizen'] = 'required';

        if($this->citizen == 1)
        {
            $validate['usernamecitizen'] = 'required|numeric|digits:12|unique:users,username';
            $validate['emailcitizen']    = 'required|email|unique:users,email';
        }
        else
        {
            $validate['usernamenoncitizen'] = 'required|between:8,10|unique:users,username';
            $validate['emailnoncitizen']    = 'required|email|unique:users,email';
        }

        $validate['fullname']  = 'required|regex:/^[\pL\s\-]+$/u';
        $validate['birthday']  = 'required';
        $validate['age']       = 'required';
        $validate['phonecode'] = 'required';
        $validate['phone']     = 'required';
        $validate['address']   = 'required';
        $validate['agreement'] = 'required';
        $validate['postcode']     = 'required';
        $validate['city']     = 'required';
        if($this->country == '130')
        {
            $validate['state']     = 'required';
        }
        $validate['country']     = 'required';
        $validate['captcha'] = 'required|captcha';
        $this->session()->flash('check', 'ok');

        return $validate;
        // return [
        //     'username' => 'required|unique:users,username,',
        //     'email' => 'required|unique:users,email',
        //     'agreement' => 'required'
        // ];
    }

    public function messages()
    {
        $validate['usernamecitizen.numeric'] = 'No Kad Pengenalan / Passport yang dimasukan tidak sah';
        $validate['usernamenoncitizen.numeric'] = 'No Kad Pengenalan / Passport yang dimasukan tidak sah';
        $validate['usernamenoncitizen.between'] = 'The username must be between 8 to 10 characters';
        $validate['usernamecitizen.between'] = 'The username must be between 12 characters';

        if($this->citizen == '1')
        {
            $validate['emailcitizen.email'] = 'The email must be valid email address';
        }
        else
        {
            $validate['emailnoncitizen.email'] = 'The email must be valid email address';
        }

        $validate['captcha.required'] = 'Please insert captcha';
        $validate['fullname.regex'] = 'The full Name must be alphabet';
        
        return $validate;
    }
}
