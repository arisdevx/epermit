<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    // 'title' => 'required',
                    'files' => 'required|image|mimes:jpg,png,jpeg|max:2024'
                ];
                break;
            
            case 'PUT':
                return [
                    // 'title' => 'required',
                    'files' => 'image|mimes:jpg,png,jpeg|max:2024'
                ];
                break;
        }
    }
}
