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
{{-- <table border="0" width="100%">
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->agency) ? $other->applicant_other_activity_detail->agency : '') }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->address) ? $other->applicant_other_activity_detail->address : '') }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->postcode) ? $other->applicant_other_activity_detail->postcode : '') }} {{ (!empty($other->applicant_other_activity_detail->bandar) ? $other->applicant_other_activity_detail->bandar : '') }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->state->name) ? $other->applicant_other_activity_detail->state->name : '') }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->country->name) ? ucwords(strtolower($other->applicant_other_activity_detail->country->name)) : '') }}</td>
	</tr>
	<tr>
		<td width="20%">Tel : {{ (!empty($other->applicant_other_activity_detail->phone) ? $other->applicant_other_activity_detail->phone : '') }}</td>
		<td>Fax : {{ (!empty($other->applicant_other_activity_detail->fax) ? $other->applicant_other_activity_detail->fax : '') }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ (!empty($other->applicant_other_activity_detail->email) ? $other->applicant_other_activity_detail->email : '') }}</td>
	</tr>
</table> --}}
{{ $applicant->user->name }}<br />
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

<p style="text-transform: uppercase;"><strong>Permohonan Menjalankan Aktiviti {{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }} di {{ ($other->type == 'hsk' ? (!empty($other->permanent_forest->name) ? $other->permanent_forest->name : '') : (!empty($other->eco_park->name) ? $other->eco_park->name : '')) }} </p>

<p>Perkara diatas dirujuk.</p>

<p>2. Dengan segala hormatnya, saya merujuk kepada perkara diatas.</p>

<p>3. Maklumat aktiviti adalah seperti berikut:</p>
<table width="100%" border="0" cellspacing="0" cellpadding="2" style="margin: 0 auto">
	<tr>
		<th style="text-align: left; width: 30%">Nama Aktiviti</th>
		<td colspan="3">{{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }}</td>
	</tr>
	<tr>
		<th style="text-align: left; width: 30%">Tarikh</th>
		<td width="30%">{{ (!empty($other->applicant_other_activity_detail->starting_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->starting_date)) : '') }}</td>
		<th style="text-align: left">Hingga</th>
		<td width="30%">{{ (!empty($other->applicant_other_activity_detail->ending_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->ending_date)) : '') }}</td>
	</tr>
	<tr>
		<th style="text-align: left; width: 30%">Lokasi</th>
		<td colspan="3">{{ ($other->type == 'hsk' ? (!empty($other->permanent_forest->name) ? $other->permanent_forest->name : '') : (!empty($other->eco_park->name) ? $other->eco_park->name : '')) }}</td>
	</tr>
	<tr>
		<th style="text-align: left; width: 30%">Bilangan Peserta</th>
		<td colspan="3">{{ (!empty($other->applicant_other_activity_detail->participant) ? $other->applicant_other_activity_detail->participant : '') }}</td>
	</tr>
	<!-- <tr>
		<th style="text-align: left; width: 30%">Tarikh Permohonan</th>
		<td colspan="3">{{ (!empty($other->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_declaration->application_date)) : '') }}</td>
	</tr> -->
</table>
<p>4.	Tujuan permohonan ini adalah bagi <strong>Menjalankan aktiviti {{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }}</strong></p>
<!-- <p>3. {{ (!empty($other->applicant_other_activity_detail->description) ? $other->applicant_other_activity_detail->description : '') }}</p> -->
<p>5. Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.</p>
<p>Yang Benar, </p>
{{ (!empty($other->applicant_other_activity_declaration->name) ? $other->applicant_other_activity_declaration->name : '') }}<br />
{{ (!empty($other->applicant_other_activity_declaration->ic_number) ? $other->applicant_other_activity_declaration->ic_number : '') }}<br />
{{ (!empty($other->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_declaration->application_date)) : '') }}