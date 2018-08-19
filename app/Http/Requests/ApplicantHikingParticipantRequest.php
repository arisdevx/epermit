<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantHikingParticipantRequest extends FormRequest
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
        $validate = [];
        $validate['hiker_fullname']         = 'required';
        $validate['hiker_ic']               = 'required|min:8';
        $validate['hiker_birthday']         = 'required';
        $validate['hiker_age']              = 'required';
        $validate['hiker_gender']           = 'required';
        $validate['hiker_nationality']      = 'required';
        $validate['hiker_phone']            = 'required';
        $validate['hiker_address']          = 'required';
        $validate['hiker_state']            = 'required';
        $validate['hiker_postcode']         = 'required';
        $validate['emergency_fullname']     = 'required';
        $validate['emergency_phone']        = 'required';
        $validate['emergency_address']      = 'required';
        $validate['emergency_relationship'] = 'required';
        if($this->hiker_country == '130')
        {
            $validate['emergency_state']        = 'required';
        }
        $validate['emergency_postcode']     = 'required';
        $validate['declaration_name']       = 'required';
        $validate['declaration_ic']         = 'required';
        $validate['declaration_date']       = 'required';
        $validate['agreement']              = 'required';
        
        return $validate;
    }
}
