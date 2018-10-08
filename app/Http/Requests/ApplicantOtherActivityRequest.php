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
                        'location'         => 'regex:/^[\pL\s\-]+$/u',
                        'starting_date'    => 'required',
                        'ending_date'      => 'required',
                        'participant'      => 'required|numeric',
                        'day'              => 'required|numeric',
                        'name'             => 'required',
                        'agency'           => 'required',
                        'phone'            => 'required|numeric',
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
                        // 'declaration_ic'   => 'required',
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
                        'location'         => 'regex:/^[\pL\s\-]+$/u',
                        'starting_date'    => 'required',
                        'ending_date'      => 'required',
                        'participant'      => 'required|numeric',
                        'day'              => 'required|numeric',
                        'name'             => 'required',
                        'agency'           => 'required',
                        'phone'            => 'required|numeric',
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
                        // 'declaration_ic'   => 'required',
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

    public function messages()
    {
        return [
            'state.required'            => 'Bidang negeri diperlukan <br /><i>The State field is required.</i>',
            'area.required'             => 'Bidang daerah diperlukan <br /><i>The Area field is required.</i>',
            'category.required'         => 'Bidang kategori diperlukan <br /><i>The Category field is required.</i>',
            'place.required'            => 'Bidang tempat aktiviti diperlukan <br /><i>The Place field is required.</i>',
            'location.regex'            => 'Bidang nyatakan lokasi tidak boleh menggunakan simbol <br /><i>Symbols is not allowed</i>',
            'starting_date.required'    => 'Bidang tarikh mula diperlukan <br /><i>The Start Date field is required</i>',
            'ending_date.required'      => 'Bidang tarikh akhir diperlukan <br /><i>The End Date field is required</i>',
            'participant.required'      => 'Bidang peserta diperlukan <br /><i>The Participant field is required</i>',
            'participant.numeric'       => 'Bidang peserta hanya boleh angka <br /><i>The Participant filed can only be numbers</i>',
            'day.required'              => 'Bidang hari diperlukan <br /><i>The Day field is required</i>',
            'day.numeric'               => 'Bidang hari hanya boleh angka <br /><i>The Day filed can only be numbers</i>',
            'name.required'             => 'Bidang nama diperlukan <br /><i>The Name field is required</i>',
            'agency.required'           => 'Bidang agency diperlukan <br /><i>The Agency field is required</i>',
            'phone.required'            => 'Bidang telefon diperlukan <br /><i>The Phone field is required</i>',
            'phone.numeric'             => 'Bidang telefon hanya boleh angka <br /><i>The Phone filed can only be numbers</i>',
            'email.required'            => 'Bidang e-mel diperlukan <br /><i>The Email field is required</i>',
            'email.email'               => 'Bidang e-mel tidak sah <br /><i>The Email is not valid</i>',
            'address.required'          => 'Bidang alamat diperlukan <br /><i>The Address field is required</i>',
            'postcode.required'         => 'Bidang pos kod diperlukan <br /><i>The Post Code field is required</i>',
            'city.required'             => 'Bidang bandar diperlukan <br /><i>The City field is required</i>',
            'state_secondary.required'  => 'Bidang negeri diperlukan <br /><i>The State field is required</i>',
            'country.required'          => 'Bidang negara diperlukan <br /><i>The Country field is required</i>',
            'description.required'      => 'Bidang deskripsi diperlukan <br /><i>The Description field is required</i>',
            'participant_file.required' => 'Bidang senarai peserta diperlukan <br /><i>The Participant List field is required</i>',
            'participant_file.mimes'    => 'Hanya fail PDF sahaja / <i>Only PDF files is allowed</i>',
            'program_file.required'     => 'Bidang atur cara program diperlukan <br /><i>The Program Guide field is required</i>',
            'program_file.mimes'        => 'Hanya fail PDF sahaja / <i>Only PDF files is allowed</i>',
            'declaration_name.required' => 'Bidang nama pemohon diperlukan <br /><i>The Applicant Name field is required</i>',
            'declaration_date.required' => 'Bidang tarikh permohonan diperlukan <br /><i>The Application Date field is required</i>',
            'agreement.required'        => 'Bidang pengesahan diperlukan <br /><i>The Agreement field is required</i>',
        ];
    }
}
