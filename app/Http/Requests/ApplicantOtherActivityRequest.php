<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantOtherActivityRequest extends FormRequest
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
                        'state'            => 'required',
                        'area'             => 'required',
                        'category'         => 'required',
                        'place'            => 'required',
                        // 'location'      => '',
                        'starting_date'    => 'required',
                        'ending_date'      => 'required',
                        'participant'      => 'required|numeric',
                        'day'              => 'required|numeric',
                        'name'             => 'required',
                        'agency'           => 'required',
                        'phone'            => 'required',
                        'email'            => 'required|email',
                        // 'fax'              => 'required',
                        'address'          => 'required',
                        'postcode'         => 'required',
                        'city'             => 'required',
                        'state_secondary'  => 'required',
                        'country'          => 'required',
                        'description'      => 'required',
                        'participant_file' => 'required|mimes:pdf',
                        'program_file'     => 'required|mimes:pdf',
                        'declaration_name' => 'required',
                        'declaration_ic'   => 'required',
                        'declaration_date' => 'required',
                        // 'state'         => 'required',
                        // 'name'          => 'required',
                        // 'ecopark'       => 'required',
                        // 'starting_date' => 'required',
                        // 'ending_date'   => 'required',
                        // 'agency_name'   => 'required|max:200',
                        // 'participant'   => 'required|max:5',
                        // 'days'          => 'required|max:5',
                        // 'note'   => 'required',
                        // 'participant_file' => 'mimes:doc,docx,xls,xlsx,pdf',
                        // 'tentative_program_file' => 'mimes:doc,docx,xls,xlsx,pdf',
                        'agreement' => 'required',
                    ];
                break;
            case 'PUT':
                return [
                        'state'            => 'required',
                        'area'             => 'required',
                        'category'         => 'required',
                        'place'            => 'required',
                        // 'location'      => '',
                        'starting_date'    => 'required',
                        'ending_date'      => 'required',
                        'participant'      => 'required|numeric',
                        'day'              => 'required|numeric',
                        'name'             => 'required',
                        'agency'           => 'required',
                        'phone'            => 'required',
                        'email'            => 'required|email',
                        // 'fax'              => 'required',
                        'address'          => 'required',
                        'postcode'         => 'required',
                        'city'             => 'required',
                        'state_secondary'  => 'required',
                        'country'          => 'required',
                        'description'      => 'required',
                        'participant_file' => 'mimes:pdf',
                        'program_file'     => 'mimes:pdf',
                        'declaration_name' => 'required',
                        'declaration_ic'   => 'required',
                        'declaration_date' => 'required',
                        // 'state'         => 'required',
                        // 'name'          => 'required',
                        // 'ecopark'       => 'required',
                        // 'starting_date' => 'required',
                        // 'ending_date'   => 'required',
                        // 'agency_name'   => 'required|max:200',
                        // 'participant'   => 'required|max:5',
                        // 'days'          => 'required|max:5',
                        // 'note'   => 'required',
                        // 'participant_file' => 'mimes:doc,docx,xls,xlsx,pdf',
                        // 'tentative_program_file' => 'mimes:doc,docx,xls,xlsx,pdf',
                        'agreement' => 'required',
                    ];
                break;
        }
        
    }
}
