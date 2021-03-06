<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \auth()->guard('applicant')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                 => 'required|unique:users,email,' . $this->segment(3),
            'password'              => 'sometimes|nullable|between:8,20|confirmed',
            'password_confirmation' => 'same:password',
            'agreement'             => 'required',
            'name'                  => 'required|regex:/^[\pL\s\-]+$/u',
            'birthday'              => 'required',
            'phonecode'             => 'required',
            'phone'                 => 'required',
            'age'                   => 'required',
            'address'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The name must be a string',
        ];
    }
}
