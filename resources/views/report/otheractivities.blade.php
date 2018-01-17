<table border="1" cellpadding="5" cellspacing="0" style="margin-bottom: 10px; width: 30%">
    <tr>
        <th colspan="2">Pemohon</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{ $applicant->user->name }}</td>
    </tr>
    <tr>
        <td>ID/IC/Passport No.</td>
        <td>{{ $applicant->user->username }}</td>
    </tr>
</table>
<table>
    <tr>
        <td></td>
    </tr>
</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>   
        <th colspan="2">A. Maklumat Permohonan</th>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Negeri</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->state->name) ? $applicant->applicantOtherActivity->state->name : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Daerah</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->area->name) ? $applicant->applicantOtherActivity->area->name : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Kategori</th>
        <td>
            @if($applicant->applicantOtherActivity->type == 'ter')
                Taman Eko-Rimba (TER)
            @elseif($applicant->applicantOtherActivity->type == 'htn')
                Hutan Taman Negeri (HTN)
            @elseif($applicant->applicantOtherActivity->type == 'hsk')
                Hutan Simpan Kekal (HSK)
            @endif
        </td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Tempat Aktiviti</th>
        <td>
            @if($applicant->applicantOtherActivity->type != 'hsk')
                {{ (!empty($applicant->applicantOtherActivity->eco_park->name) ? $applicant->applicantOtherActivity->eco_park->name : '-') }}
            @else
                {{ (!empty($applicant->applicantOtherActivity->permanent_forest->name) ? $applicant->applicantOtherActivity->permanent_forest->name : '-') }}
            @endif
        </td>
    </tr>
    @if($applicant->applicantOtherActivity->type == 'hsk')
    <tr>
        <th style="text-align: left; width: 30%">Nyatakan Lokasi</th>
        <td>
            {{ (!empty($applicant->applicantOtherActivity->location) ? $applicant->applicantOtherActivity->location : '-') }}
        </td>
    </tr>
    @endif
    <tr>
        <th style="text-align: left; width: 30%">Tarikh Mula</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->starting_date) ? date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->starting_date)) : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Tarikh Akhir</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->ending_date) ? date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->ending_date)) : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Bilangan Peserta</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->participant) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->participant : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Bilangan Hari</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->day) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->day : '-') }}</td>
    </tr>
    @if($applicant->applicantOtherActivity->type == 'hsk')
    <tr>
        <th style="text-align: left; width: 30%">Harga</th>
        <td>RM {{ (!empty($applicant->applicantOtherActivity->amount) ? $applicant->applicantOtherActivity->amount : '-') }}</td>
    </tr>
    @endif
    <tr>
        <th style="text-align: left; width: 30%">Nama Aktiviti</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->name) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->name : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Nama Agensi/Persatuan/Individu</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->agency) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->agency : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">No Telefon</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->phone) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->phone : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Email</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->email) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->email : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">No Faks</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->fax) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->fax : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Alamat</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->address) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->address : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Poskod</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->postcode) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->postcode : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Bandar</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->bandar) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->bandar : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Negeri</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->state->name) ? $applicant->applicantOtherActivity->applicant_other_activity_detail->state->name : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Negara</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->country->name) ? ucwords(strtolower($applicant->applicantOtherActivity->applicant_other_activity_detail->country->name)) : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Keterangan Aktiviti</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_detail->description) ? ucwords(strtolower($applicant->applicantOtherActivity->applicant_other_activity_detail->description)) : '-') }}</td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    
    <tr>   
        <th colspan="2">B. Pengesahan Permohonan</th>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Nama Penuh</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_declaration->name) ? $applicant->applicantOtherActivity->applicant_other_activity_declaration->name : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">No K/P & Pasport</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_declaration->ic_number) ? ucwords(strtolower($applicant->applicantOtherActivity->applicant_other_activity_declaration->ic_number)) : '-') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Tarikh</th>
        <td>{{ (!empty($applicant->applicantOtherActivity->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_declaration->application_date)) : '-') }}</td>
    </tr>
</table>