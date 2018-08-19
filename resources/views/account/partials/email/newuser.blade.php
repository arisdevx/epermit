<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran Akaun</title>
</head>
<body>
<h3 style="text-align: center;">Makluman Pendaftaran Akaun Baru</h3>
<p>Sistem pemohon permit menerima pendaftaran ahli baru. Butiran pendaftaran adalah seperti berikut:</p>
<table width="100%">
  <tr>
    <td width="35%">Nama Pengguna</td>
    <td width="1%">:</td>
    <td>{{ $full_name }}</td>
  </tr>
  <tr>
    <td width="35%">Kata Nama (Kad Pengenalan / Passport)</td>
    <td width="1%">:</td>
    <td>{{ $username }}</td>
  </tr>
  <tr>
    <td width="35%">No Pendaftaran Pengguna</td>
    <td width="1%">:</td>
    <td>{{ $id }}</td>
  </tr>
</table>
<p>Sekian, terima kasih.</p>
</body>
</html>