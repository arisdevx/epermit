<!DOCTYPE html>
<html>
<head>
  <title>Resit</title>
</head>
<body>
<p>
{{ $full_name }},<br />
Permohonan anda telah DILULUSKAN.
</p>
<p>RINGKASAN PERMOHONAN:</p>

<p>Sila menjelaskan bayaran berjumlah <strong>RM {{ $amount }}</strong> dalam tempoh masa <strong>tujuh (7)</strong> hari bekerja dengan menghantar wang pos/bank draf atas nama <strong>Pengarah Perhutanan Negeri {{ $state }}</strong></p>
<p>No resit anda ialah <strong>{{ $receipt }}</strong></p>
<p>Sekian, terima kasih.</p>
<br>
<p style="text-align: center;"><i>*cetakan ini adalah berkomputer dan tidak memerlukan tandatangan</i></p>
</body>
</html>

{{-- <div>
  <p>{{ $number }}</p>
  <p style="text-align: right;">TARIKH: {{ date('d M Y') }}</p>
  <p>{{ $full_name }},</p>
  <p style="margin-bottom: 20px;">Pembayaran anda telah diterima. No resit anda {{ $receipt }}</p>
  <p style="margin-bottom: 20px;">RINGKASAN PERMOHONAN:</p>
    @if($type == 'hiking')
      <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <tr>
          <th style="width: 40%; text-align: left;">NO. PERMOHONAN</th>
          <td><strong>{{ strtoupper($number) }}</strong></td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">TARIKH PERMOHONAN</th>
          <td>{{ strtoupper($applicant_date) }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">KATEGORI PERMOHONAN</th>
          <td>{{ $category }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">LOKASI PENDAKIAN</th>
          <td>{{ strtoupper($place) }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">DAERAH</th>
          <td>{{ strtoupper($area) }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">NEGERI</th>
          <td>{{ strtoupper($state) }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">TARIKH PENDAKIAN</th>
          <td>{{ strtoupper($starting_date) }}</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">BILANGAN PESERTA</th>
          <td>{{ strtoupper($participant) }} ORANG</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">BILANGAN MALIM GUNUNG</th>
          <td>{{ strtoupper($guide) }} ORANG</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">JUMLAH PERLU BAYAR</th>
          <td>Permit Memasuki HSK x {{ $total_person }} = <strong>RM {{ $amount }}</strong></td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">FI KONSERVASI</th>
          <td>Tiada</td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">STATUS PEMBAYARAN</th>
          <td><strong>DIJELASKAN</strong></td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">NO. RESIT PEMBAYARAN</th>
          <td><strong>{{ strtoupper($receipt) }}</strong></td>
        </tr>
        <tr>
          <th style="width: 40%; text-align: left;">SENARAI MALIM & PESERTA</th>
          <td><strong>SEPERTI DI LAMPIRKAN</strong></td>
        </tr>
      </table>
    @endif
  <p style="margin-top: 20px;margin-bottom: 30px;">Sila cetak penyata ini untuk sebagai rujukan semasa proses tuntutan permit di {{ (!empty($gov_phd) ? $gov_phd : 'Pejabat Hutan Daerah') }}.</p>
  <p style="margin-bottom: 30px;">Sekian, terima kasih.</p>
  <p style="text-align: center;"><i>*Sila cetak penyata ini dan kemukakan bersama-sama wang pos/bank draf</i></p>
</div> --}}