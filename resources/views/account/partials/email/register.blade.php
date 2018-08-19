<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran Akaun</title>
</head>
<body>
<p>Tahniah! <br>Congratulation.</p>
<p>{{ $full_name }},</p>
<p>Anda berjaya mendaftar akauan di Sistem Permohonan Permit. <br>Maklumat akaun anda adalah seperti berikut:</p>
<table border="0" width="100%">
  <tr>
    <td width="35%">Kata Nama (Kad Pengenalan / Passport)</td>
    <td width="1%">:</td>
    <td>{{ $username }}</td>
  </tr>
  <tr>
    <td width="35%">Kata Laluan</td>
    <td width="1%">:</td>
    <td>{{ $password }}</td>
  </tr>
</table>
<p>Sila klik butang "Pengaktifan Akaun" untuk aktif akaun.</p>
<p style="text-align: center;"><a href="{{ $activated_link }}" style="text-align: center; text-decoration: none; display: inline-block; width: 150px; padding: 10px; background-color: #e40001; color: #ffffff; margin: 0 auto;">Pengaktifan Akaun</a></p>
<p>Sebarang pertanyaan, sila hubungi di <a href="mailto:ecojpsm@forestry.gov.my">ecojpsm@forestry.gov.my</a> atau 03-03-26164488.</p>
<p>Sekian, terima kasih.</p>
</body>
</html>