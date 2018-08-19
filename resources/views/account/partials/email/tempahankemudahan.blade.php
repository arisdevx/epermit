<!DOCTYPE html>
<html>
<head>
  <title>Aktiviti Pendakian</title>
</head>
<body>
<p>{{ $applicant->user->name }},</p>
<p>Anda telah berjaya membuat tempahan kemudahan seperti maklumat dibawah ini:</p><br />
<table border="0" width="100%">
  <tr>
    <td width="30%">TER/HTN</td>
    <td width="1%">:</td>
    <td>{{ (!empty($type) ? $type : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Nama TER/HTN</td>
    <td width="1%">:</td>
    <td>{{ (!empty($ecopark) ? $ecopark : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Negeri</td>
    <td width="1%">:</td>
    <td>{{ (!empty($state) ? $state->name : '-') }}</td>
  </tr>
  <tr>
    <td width="30%">Daerah</td>
    <td width="1%">:</td>
    <td>{{ (!empty($area) ? $area->name : '-') }}</td>
  </tr>
</table>
<p>Jika anda mempunyai masalah, sila hubungi kami di talian 03-26164488 atau email <a href="mailto:ecojpsm@forestry.gov.my">ecojpsm@forestry.gov.my</a></p>
<p>Sekian, terima kasih</p>
</body>
</html>