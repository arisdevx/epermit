<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantHikingRequest extends FormRequest
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
            case 'PUT':
                return [
                    'state'              => 'required',
                    'area'               => 'required',
                    'mountain'           => 'required',
                    'starting_date'      => 'required',
                    // 'starting_time'      => 'required',
                    'ending_date'        => 'required',
                    // 'arrival_time'       => 'required',
                    'mountain_guide'     => 'required',
                    'participant'        => 'required',
                    'hiker_fullname'     => 'required',
                    'hiker_ic'           => 'required',
                    'hiker_birthday'     => 'required',
                    'hiker_age'          => 'required',
                    'hiker_gender'       => 'required',
                    'hiker_nationality'  => 'required',
                    'hiker_phone'        => 'required',
                    'hiker_address'      => 'required',
                    'hiker_state'        => 'required',
                    'hiker_postcode'     => 'required',
                    'emergency_fullname' => 'required',
                    'emergency_phone'    => 'required',
                    'emergency_address'  => 'required',
                    'emergency_state'    => 'required',
                    'emergency_postcode' => 'required',
                    'declaration_name'   => 'required',
                    'declaration_ic'     => 'required',
                    'declaration_date'   => 'required',
                    'agreement' => 'required',
                ];
                break;
            
            default:
                # code...
                break;
        }
    }
}
