<!DOCTYPE html>
<html>
<head>
  <title>Aktiviti Pendakian</title>
</head>
<body>
<p>{{ $applicant->user->name }},</p>
<p>Anda telah berjaya membuat permohonan lain-lain aktiviti seperti maklumat dibawah ini:</p><br />
<table border="0" width="100%">
  <tr>
    <td width="30%">Tempat Aktiviti</td>
    <td width="1%">:</td>
    <td>{{ (!empty($place) ? $place : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Nama Aktiviti</td>
    <td width="1%">:</td>
    <td>{{ (!empty($name) ? $name : '-') }}</td>
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
<p>Jika anda mempunyai masalah, sila hubungi kami di talian 03-26164488 atau email <a href="mailto:ecojpsm@forestry.gov.my">ecojpsm@forestry.gov.my</a></p>
<p>Sekian, terima kasih</p>
</body>
</html>