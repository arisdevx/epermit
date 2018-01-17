<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantConvenienceRequest extends FormRequest
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
            'state'                => 'required',
            'area'                 => 'required',
            'type'                 => 'required',
            'eco_park'             => 'required',
            'starting_date'        => 'required',
            'ending_date'          => 'required',
            'day'                  => 'required',
            'convenience_category' => 'required',
            'amount'               => 'required',
            'agreement' => 'required',
        ];
    }
}
