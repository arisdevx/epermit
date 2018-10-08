<!DOCTYPE html>
<html>
<head>
  <title>Aktiviti Pendakian</title>
</head>
<body>
<p>{{ $full_name }},</p>
<p>Anda telah berjaya membuat permohonan aktiviti pendakian seperti maklumat dibawah ini:</p><br />
<table border="0" width="100%">
  <tr>
    <td width="30%">Tarikh Mula Pendakian</td>
    <td width="1%">:</td>
    <td>{{ (!empty($starting_date) ? $starting_date : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Tarikh Akhir Pendakian</td>
    <td width="1%">:</td>
    <td>{{ (!empty($ending_date) ? $ending_date : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Nama Gunung</td>
    <td width="1%">:</td>
    <td>{{ (!empty($mountain) ? $mountain : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Negeri</td>
    <td width="1%">:</td>
    <td>{{ (!empty($state) ? $state : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Daerah</td>
    <td width="1%">:</td>
    <td>{{ (!empty($area) ? $area : '-') }}</td>
  </tr>
</table>
<p>Untuk melangkapi proses permohonan anda, sila lengkapkan maklumat peserti seperti link berikut:</p>
<p>Sila hantarkan link dibawah ini ke Peserta Pendakian untuk proses pendaftaran.<br /><a href="{{ $form }}">{{ $form }}</a></p>
<p>Jika anda mempunyai masalah, sila hubungi kami di talian 03-26164488 atau email <a href="mailto:ecojpsm@forestry.gov.my">ecojpsm@forestry.gov.my</a></p>
<p>Sekian, terima kasih</p>
</body>
</html>