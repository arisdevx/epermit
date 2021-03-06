<!-- <table border="0" width="100%" style="padding: 0; margin: 0">
  <tr>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-tiger-logo.png') }}" style="width: 150px">
    </td>
    <td width="50%" align="center">
    JABATAN PERHUTANAN NEGERI<br /> 
    {{ (!empty($phd_data->name) ? $phd_data->name : 'Pegawai Hutan Daerah') }}<br />
    {{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}<br />
    No. Tel: {{ (!empty($phd_data->phone) ? $phd_data->phone : '-') }} Fax: {{ (!empty($phd_data->fax) ? $phd_data->fax : '-') }} Email: {{ (!empty($phd_data->email) ? $phd_data->email : '-') }} 
    </td>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-mail-logo.png') }}" style="width: 100px">
    </td>
  </tr>
</table> -->
{{-- {{ $applicant_convenience->state->name }}<br />
{{ $applicant_convenience->area->name }}<br />
{{ $applicant->user->email }}<br /> --}}
{{ $applicant->user->name }} <br>
{{ $applicant->user->profile->address_1 }}
<hr />

<table width="100%" border="0">
    <tr>
        <td width="50%">{{ (!empty($phd_data->name) ? $phd_data->name : 'Pegawai Hutan Daerah') }}</td>
        <td width="50%">No Rujukan : {{ $applicant->number }}</td>
    </tr>
    <tr>
        <td width="50%">{{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}</td>
        <td width="50%">Tarikh : {{ date('d/m/Y') }}</td>
    </tr>
</table>

<p>Tuan / Puan, </p>

<p style="text-transform: uppercase;"><strong>Permohonan {{-- Menjalankan Aktiviti --}} Tempahan Kemudahan di {{ $applicant_convenience->eco_park->name }}</strong></p>
<p>Perkara di atas dirujuk.</p>
<p>2. Dengan segala hormatnya, saya merujuk kepada perkara diatas.</p>

<p>3. Maklumat aktiviti adalah seperti berikut:</p>
<table width="100%" border="1" cellspacing="0" cellpadding="3">
    <thead>
        <tr>
            <th>No</th>
            <th>Maklumat Permohonan</th>
            <th>Tarikh Mula</th>
            <th>Tarikh Akhir</th>
            <th>Bil Hari</th>
            <th>Kemudahan</th>
        </tr>
    </thead>
    <tbody>
        @if(!$applicant->applicant_convenience->isEmpty())
            @php($no = 1)
            @foreach($applicant->applicant_convenience as $convenience)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        Negeri: <strong>{{ (!empty($convenience->state->name) ? $convenience->state->name : '-') }}</strong><br />
                        Daerah: <strong>{{ (!empty($convenience->area->name) ? $convenience->area->name : '-') }}</strong><br />
                        TER/HTN:    <strong>@if($convenience->eco_park_type == 'ter')
                                        Taman Eko-Rimba (TER)
                                    @elseif($convenience->eco_park_type == 'htn')
                                        Hutan Taman Negeri (HTN)
                                    @elseif($convenience->eco_park_type == 'hsk')
                                        Hutan Simpan Kekal (HSK)
                                    @endif
                                    </strong>
                                    <br />
                        Nama TER/HTN: <strong>{{ (!empty($convenience->eco_park->name) ? $convenience->eco_park->name : '-') }}</strong><br />
                    </td>
                    <td>{{ date('d/m/Y', strtotime($convenience->starting_date)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
                    <td>{{ (!empty($convenience->days_total) ? $convenience->days_total : '-') }} Hari</td>
                    <td>
                        @if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
                            {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Orang 
                            @if($applicant->applicantConvenience->nationality == '0')
                                Bukan Warganegara
                            @else
                                Warganegara
                            @endif
                        @else
                            {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Unit {{ (!empty($convenience->convenience->convenience_category->name) ? $convenience->convenience->convenience_category->name : '-') }} - {{ (!empty($convenience->convenience->convenience_sub_category->name) ? $convenience->convenience->convenience_sub_category->name : '-') }}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<p>4. Tujuan permohonan ini adalah bagi Permohonan Tempahan Kemudahan di {{ $applicant_convenience->eco_park->name }}</p>
<p>5. Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.</p>
<p>Yang Benar, </p>
{{ $applicant->applicant_convenience_declaration->name }}<br />
{{ $applicant->applicant_convenience_declaration->ic_number }}<br />
{{ date('d/m/Y', strtotime($applicant->applicant_convenience_declaration->application_date)) }}
{{-- <table border="0" width="100%" style="padding: 0; margin: 0">
  <tr>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-tiger-logo.png') }}" style="width: 150px">
    </td>
    <td width="50%" align="center">
    JABATAN PERHUTANAN NEGERI<br /> 
    {{ (!empty($phd_data->name) ? $phd_data->name : 'Pegawai Hutan Daerah') }}<br />
    {{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}<br />
    No. Tel: {{ (!empty($phd_data->phone) ? $phd_data->phone : '-') }} Fax: {{ (!empty($phd_data->fax) ? $phd_data->fax : '-') }} Email: {{ (!empty($phd_data->email) ? $phd_data->email : '-') }} 
    </td>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-mail-logo.png') }}" style="width: 100px">
    </td>
  </tr>
</table>

<hr />

<table width="100%" border="0">
    <tr>
        <td width="50%">{{ (!empty($phd_data->name) ? $phd_data->name : 'Pegawai Hutan Daerah') }}</td>
        <td width="50%">No Rujukan : {{ $applicant->number }}</td>
    </tr>
    <tr>
        <td width="50%">{{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}</td>
        <td width="50%">Tarikh : {{ date('d/m/Y') }}</td>
    </tr>
</table>

<p>Tuan / Puan, </p>

<p style="text-transform: uppercase;"><strong>Permohonan Tempahan Kemudahan di {{ $applicant_convenience->eco_park->name }}
<br />No Permohonan : {{ $applicant->number }}</strong></p>

<p><strong>Dengan segala hormatnya, saya merujuk kepada perkara diatas.</strong></p>

<p><strong>1. Maklumat aktiviti adalah seperti berikut:</strong></p>
<table width="80%" border="1" cellspacing="0" cellpadding="5" style="margin: 0 auto">
    <tr>
        <th style="text-align: left; width: 30%">Nama Aktiviti</th>
        <td colspan="3">Tempahan Kemudahan</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Tarikh</th>
        <td width="30%">{{ (!empty($applicant_convenience->starting_date) ? date('d/m/Y', strtotime($applicant_convenience->starting_date)) : '') }}</td>
        <th style="text-align: left">Hingga</th>
        <td width="30%">{{ (!empty($applicant_convenience->ending_date) ? date('d/m/Y', strtotime($applicant_convenience->ending_date)) : '') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Bilangan Hari</th>
        <td colspan="3">{{ $applicant_convenience->days_total }} Hari</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Lokasi</th>
        <td colspan="3">{{ $applicant_convenience->eco_park->name }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Bilangan {{ ((($applicant_convenience->convenience_category_id == '2') OR ($applicant_convenience->convenience_category_id == '3')) ? ' Peserta' : ' Unit') }}</th>
        <td colspan="3">{{ $applicant_convenience->participant }} {{ ((($applicant_convenience->convenience_category_id == '2') OR ($applicant_convenience->convenience_category_id == '3')) ? 'Orang' : ' Unit') }}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 30%">Tarikh Permohonan</th>
        <td colspan="3">{{ date('d/m/Y', strtotime($applicant_convenience->applicant_convenience_declaration->application_date)) }}</td>
    </tr>
</table>
<p>3. Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.</p>
<p>Yang Benar, </p>
{{ $applicant_convenience->applicant_convenience_declaration->name }}<br />
{{ $applicant_convenience->applicant_convenience_declaration->ic_number }}<br />
{{ date('d/m/Y', strtotime($applicant_convenience->applicant_convenience_declaration->application_date)) }} --}}