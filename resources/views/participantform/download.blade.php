<table border="0" width="100%" style="padding: 0; margin: 0">
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
		<td align="center"><strong>Maklumat Pendaftaran Peserta Pendakian</strong></td>
	</tr>
</table>

<div style="border: 1px solid #000; padding: 20px; margin-top: 20px">
	<strong>MAKLUMAT PENDAKIAN</strong>
	<table width="100%" border="0" style="margin-top: 15px;">
		<tr>
			<td width="20%">Nama Penuh</td>
			<td width="1%">:</td>
			<td>{{ $biodata->fullname }}</td>
		</tr>
		<tr>
			<td width="20%">Warganegara</td>
			<td width="1%">:</td>
			<td>{{ ($biodata->nationality == '1' ? 'Ya' : 'Bukan') }}</td>
		</tr>
		<tr>
			<td width="20%">No Kad Pengenalan</td>
			<td width="1%">:</td>
			<td>{{ $biodata->ic_number }}</td>
		</tr>
		<tr>
			<td width="20%">Tarikh Lahir</td>
			<td width="1%">:</td>
			<td>{{ date('d/m/Y', strtotime($biodata->birthday)) }}</td>
		</tr>
		<tr>
			<td width="20%">Umur</td>
			<td width="1%">:</td>
			<td>{{ $biodata->age }}</td>
		</tr>
		<tr>
			<td width="20%">Jantina</td>
			<td width="1%">:</td>
			<td>{{ ($biodata->gender == 'M' ? 'Lelaki' : 'Perempuan') }}</td>
		</tr>
		<tr>
			<td width="20%">Telefon</td>
			<td width="1%">:</td>
			<td>{{ $biodata->phone }}</td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td width="1%">:</td>
			<td>{{ $biodata->address }}</td>
		</tr>
		<tr>
			<td width="20%">Poskod</td>
			<td width="1%">:</td>
			<td>{{ $biodata->postcode }}</td>
		</tr>
		<tr>
			<td width="20%">Negeri</td>
			<td width="1%">:</td>
			<td>{{ $biodata->state->name }}</td>
		</tr>
		<tr>
			<td width="20%">Negara</td>
			<td width="1%">:</td>
			<td>{{ ucwords(strtolower($biodata->country->name)) }}</td>
		</tr>
	</table>

	<strong style="margin-top: 15px; display: block">MAKLUMAT ORANG UNTUK DIHUBUNGI JIKA BERLAKU KECEMASAN</strong>
	<table width="100%" border="0" style="margin-top: 15px;">
		<tr>
			<td width="20%">Nama Penuh</td>
			<td width="1%">:</td>
			<td>{{ $emergency->name }}</td>
		</tr>
		<tr>
			<td width="20%">Telefon</td>
			<td width="1%">:</td>
			<td>{{ $emergency->phone }}</td>
		</tr>
		<tr>
			<td width="20%">Alamat</td>
			<td width="1%">:</td>
			<td>{{ $emergency->address }}</td>
		</tr>
		<tr>
			<td width="20%">Poskod</td>
			<td width="1%">:</td>
			<td>{{ $emergency->postcode }}</td>
		</tr>
		<tr>
			<td width="20%">Negeri</td>
			<td width="1%">:</td>
			<td>{{ $emergency->state->name }}</td>
		</tr>
		<tr>
			<td width="20%">Negara</td>
			<td width="1%">:</td>
			<td>{{ ucwords(strtolower($emergency->country->name)) }}</td>
		</tr>
	</table>

	<strong style="margin-top: 15px; display: block">MAKLUMAT POLIS INSURANS</strong>
	<table width="100%" border="0" style="margin-top: 15px;">
		<tr>
			<td width="20%">Nama Syarikat</td>
			<td width="1%">:</td>
			<td>{{ (!empty($insurance->name) ? $insurance->name : '-') }}</td>
		</tr>
		<tr>
			<td width="20%">No Polis Insurans</td>
			<td width="1%">:</td>
			<td>{{ (!empty($insurance->code) ? $insurance->code : '-') }}</td>
		</tr>
	</table>

	<strong style="margin-top: 15px; display: block">MAKLUMAT KESIHATAN PENDAKI</strong>
	<table width="100%" border="0" style="margin-top: 15px;">
    <tbody>
         <tr>
            <th colspan="2">Bahagian 1 <i>Part 1</i></th>
            <th align="center" style="text-align: center;">Status</th>
            <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">1.</td>
            <td width="70%">Adakah anda sedang menerima rawatan? Jika ada sila nyatakan. <i>Are you under treatment? If YES, please spesify</i></td>
            <td align="center">{{ (getHealthy('treatment', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('treatment', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">2.</td>
            <td>Adakah anda pernah dimasukan ke hospital atas apa-apa penyakit? Jika ADA, sila nyatakan tarikh dan sebab. <i>Have you ever been hospitalized for any disease? If YES, pleas spesify the date and reason.</i></td>
            <td align="center">{{ (getHealthy('hospital', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('hospital', $health->id)->notes }}</td>
        </tr>
        <tr>
            <th colspan="2">Bahagian 2 (Pernah anda mengalami situasi berikut?)<i>Part 1 (Have you experienced the following situation?)</i></th>
            <th align="center" style="text-align: center;">Status</th>
            <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">1.</td>
            <td>Masalah pening, pitam atau pengsan <i>Dizziness, blacked or paralysis</i></td>
            <td align="center">{{ (getHealthy('blacked', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('blacked', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">2.</td>
            <td>Sawan dan Kelumpuhan <i>Fits/Epilepsy or Paralysis</i></td>
            <td align="center">{{ (getHealthy('fits', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('fits', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">3.</td>
            <td>Selalu Sakit Kepala <i>Frequent Headache/Migraine</i></td>
            <td align="center">{{ (getHealthy('migraine', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('migraine', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">4.</td>
            <td>Kencing Manis <i>Diabetes</i></td>
            <td align="center">{{ (getHealthy('diabetes', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('diabetes', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">5.</td>
            <td>Tekanan Darah Tinggi/Tekanan Darah Rendah <i>High/Low Blood Pressure</i></td>
            <td align="center">{{ (getHealthy('highblood', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('highblood', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">6.</td>
            <td>Penyakit Jantung dan Saluran Darah <i>Cardiovascular Diseases</i></td>
            <td align="center">{{ (getHealthy('cardiovascular', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('cardiovascular', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">7.</td>
            <td>Demam Berpanjangan <i>Prolonged Fever</i></td>
            <td align="center">{{ (getHealthy('fever', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('fever', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">8.</td>
            <td>Demam Kura <i>Malaria</i></td>
            <td align="center">{{ (getHealthy('malaria', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('malaria', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">9.</td>
            <td>Lelah <i>Asthma</i></td>
            <td align="center">{{ (getHealthy('asthma', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('asthma', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">10.</td>
            <td>Batuk Kering/Tibi/Radang Paru-paru <i>Dry Cough/Tuberculosis/Pneumoni</i></td>
            <td align="center">{{ (getHealthy('drycough', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('drycough', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">11.</td>
            <td>Masalah Buang Pinggang/Kencing <i>Kedney/Urinary Problems</i></td>
            <td align="center">{{ (getHealthy('urine', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('urine', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">12.</td>
            <td>Pernah Mengalami Sebarang Pembedahan <i>Surgical Operation</i></td>
            <td align="center">{{ (getHealthy('surgical', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('surgical', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">13.</td>
            <td>Pernah Mengalami Kecederaan Kepala/Anggota Batan Yang Teruk <i>Head/Limb Injuries</i></td>
            <td align="center">{{ (getHealthy('limb', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('limb', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">14.</td>
            <td>Kecacatan Anggota/Deria <i>Deformities-physical/sense</i></td>
            <td align="center">{{ (getHealthy('deformities', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('deformities', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">15.</td>
            <td>Penyakit Kurang Darah/Masalah Pendarahan <i>Anaemia & Bleeding Disorders</i></td>
            <td align="center">{{ (getHealthy('anaemia', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('anaemia', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">16.</td>
            <td>Adakah Anda Merokok <i>Cigarette Smoking</i></td>
            <td align="center">{{ (getHealthy('smoking', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('smoking', $health->id)->notes }}</td>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">17.</td>
            <td>Lain-lain Penyakit Untuk Diberitahu <i>Other Illness</i></td>
            <td align="center">{{ (getHealthy('other', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('other', $health->id)->notes }}</td>
        </tr>
        <tr>
            <th colspan="2">Untuk Wanita <i>Women Only</i></th>
            <th align="center" style="text-align: center;">Status</th>
            <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
        </tr>
        <tr>
            <td width="2%" valign="top" align="center">18.</td>
            <td>Mengandung <i>Pregnant</i></td>
            <td align="center">{{ (getHealthy('pregnant', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
            <td>{{ getHealthy('pregnant', $health->id)->notes }}</td>
        </tr>
    </tbody>
</table>

	<strong style="margin-top: 15px; display: block">PENGAKUAN DAN KEBENARAN PENDAKI</strong>
	<table width="100%" border="0" style="margin-top: 15px;">
		<tr>
			<td width="20%">Nama Penuh</td>
			<td width="1%">:</td>
			<td>{{ $declaration->fullname }}</td>
		</tr>
		<tr>
			<td width="20%">No Kad Pengenalan</td>
			<td width="1%">:</td>
			<td>{{ $declaration->ic_number }}</td>
		</tr>
		<tr>
			<td width="20%">Tarikh Pendaftaran</td>
			<td width="1%">:</td>
			<td>{{ date('d/m/Y', strtotime($declaration->date)) }}</td>
		</tr>
	</table>
</div>