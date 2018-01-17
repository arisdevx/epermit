<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
            // 'email'                 => 'required|email|unique:users,email,'. $this->segment(3) . ',id'
            'password'              => 'sometimes|nullable|between:8,20',
            'confirm_password'      => 'same:password',
            // 'agreement'             => 'required',
            'name'                  => 'required',
            // 'birthday'              => 'required',
            // 'phonecode'             => 'required',
            // 'phone'                 => 'required',
            // 'age'                   => 'required',
            // 'address'               => 'required',
        ];
    }
}
