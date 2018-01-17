<table border="0" width="100%" style="padding: 0; margin: 0">
  <tr>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-tiger-logo.png') }}" style="width: 150px">
    </td>
    <td width="80%" align="center">
    JABATAN PERHUTANAN NEGERI<br />
    {{ (!empty($phd_name) ? $phd_name : 'Pegawai Hutan Daerah') }}<br />
    {{ (!empty($phd_address) ? $phd_address : 'Alamat Pejabat Hutan Daerah') }}<br />
    No. Tel: {{ (!empty($phd_phone) ? $phd_phone : '-') }} Fax: {{ (!empty($phd_fax) ? $phd_fax : '-') }} Email: {{ (!empty($phd_email) ? $phd_email : '-') }} 
    </td>
    <td width="20%" align="center">
      <img src="{{ url('img/jpsm-mail-logo.png') }}" style="width: 100px">
    </td>
  </tr>
</table>
<hr>
<table border="0" width="100%">
  <tr>
    <td width="50%">Nama Pemohon: {{ $applicant->user->name }}</td>
    <td width="50%">No. Rujukan: {{ $number }}</td>
  </tr>
  <tr>
    <td width="50%">Alamat Pemohon: {{ (!empty($applicant->user->profile->address) ? $applicant->user->profile->address . ', ' : '') }}
                                    {{ (!empty($applicant->user->profile->postcode) ? $applicant->user->profile->postcode . ', ' : '') }}
                                    {{ (!empty($applicant->user->profile->city) ? $applicant->user->profile->city . ', ' : '') }}
                                    {{ (!empty($applicant->user->user_profile->state) ? $applicant->user->user_profile->state . ', ' : '') }}
                                    {{ (!empty($applicant->user->user_profile->country) ? $applicant->user->user_profile->country . '' : '') }}</td>
    <td width="50%">Tarikh: {{ $date }}</td>
  </tr>
  <tr>
    <td colspan="2">No. Tel. : {{ (!empty($applicant->user->profile->phone) ? $applicant->user->profile->phone : '-') }} </td>
  </tr>
  <tr>
    <td colspan="2">Email: {{ $applicant->user->email }}</td>
  </tr>
</table>
<br />
Tuan/Puan,<br>
<strong>
  PERMOHONAN DILULUSKAN BAGI MENJALANKAN {{ strtoupper(strtolower($type)) }} DI {{ strtoupper(strtolower((!empty($place) ? $place : $ecopark))) }} NO PERMOHONAN: {{ $number }}
  <br>
  <table width="100%">
    <tr>
      <td style="font-weight: bold; width: 30%">STATUS</td>
      <td style="font-weight: bold;">: DILULUSKAN</td>
    </tr>
    <tr>
      <td style="font-weight: bold; width: 30%">NO. PERMOHONAN</td>
      <td style="font-weight: bold;">: {{ $number }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold; width: 30%">NO. RESIT</td>
      <td style="font-weight: bold;">: {{ $receipt }}</td>
    </tr>
  </table>
</strong>
<br />
Dengan segala hormatnya, saya merujuk kepada perkara diatas.<br /><br>
2. Maklumat aktiviti adalah sebagai berikut
<br /><br>
<table border="1" cellspacing="0" width="100%">
  <tr>
    <td width="30%"><strong>Nama Aktiviti</strong></td>
    <td colspan="3">{{ $type }}</td>
  </tr>
   <tr>
    <td width="30%"><strong>Tarikh</strong></td>
    <td>{{ $starting_date }}</td>
    <td><strong>Hingga</strong></td>
    <td>{{ $ending_date }}</td>
  </tr>
   <tr>
    <td width="30%"><strong>Lokasi</strong></td>
    <td colspan="3">{{ strtoupper((!empty($place) ? $place : $ecopark)) }}</td>
  </tr>
   <tr>
    <td width="30%"><strong>Bilangan Peserta</strong></td>
    <td colspan="3">{{ $participant }}</td>
  </tr>
   <tr>
    <td width="30%"><strong>Tarikh Permohonan</strong></td>
    <td colspan="3">{{ $activity_date }}</td>
  </tr>
</table>
<br />
3. Segala perlakuan dan perbuatan Tuan/Puan semasa berada di kawasan ini adalah tertakluk kepada undang-undang serta peraturan sedang berkuatkuasa dan tindakan boleh diambil sekiranya ingkar.
<br /><br />
4. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.
<br /><br />
Sekian, terima kasih<br /><br />
<strong>“BERKHIDMAT UNTUK NEGARA”<br />
“NEGARAKU, ALAM SEKITARKU”</strong>
<br />
Pegawai Hutan Daerah<br />
Alamat Pejabat Hutan Daerah<br />
No. Tel: - Fax:- <br />
Email: -
<p style="text-align: center;">(Slip ini adalah cetakan komputer, tidak memerlukan tandatangan)</p>
{{-- <!-- THIS EMAIL WAS BUILT AND TESTED WITH LITMUS http://litmus.com -->
<!-- IT WAS RELEASED UNDER THE MIT LICENSE https://opensource.org/licenses/MIT -->
<!-- QUESTIONS? TWEET US @LITMUSAPP -->
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* FONTS */
    @media screen {
        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 400;
          src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
        }
        
        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 700;
          src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
        }
        
        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 400;
          src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
        }
        
        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 700;
          src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
        }
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    
    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
   Status Permohonan
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#FFFFFF" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td bgcolor="#f4f4f4" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Arial, sans-serif; font-size: 20px; font-weight: bold; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 22px; font-weight: 400; margin: 0;">Status Permohonan</h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#FFFFFF" align="center" style="padding: 0px 10px 20px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
              <!-- COPY -->
              
              
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <p>Tuan, </p>
                  <p>
                    Status permohonan anda telah berjaya ditukarkan oleh sistem:
                  <table width="100%" border="1" cellpadding="5" cellspacing="0">
                    <tr>
                      <th width="30%" style="text-align: left">No Permohonan</th>
                      <td>{{ $number }}</td>
                    </tr>
                    <tr>
                      <th width="30%" style="text-align: left">Tarikh Permohonan</th>
                      <td>{{ $date }}</td>
                    </tr>
                    <tr>
                      <th width="30%" style="text-align: left">Jenis Permohonan</th>
                      <td>{{ $type }}</td>
                    </tr>
                    <tr>
                      <th width="30%" style="text-align: left">Lokasi</th>
                      <td>{{ $place }}</td>
                    </tr>
                    <tr>
                      <th width="30%" style="text-align: left">Status</th>
                      <td>{{ $status }}</td>
                    </tr>
                  </table>
                  @if($status == 'Selesai' && empty($ecopark))
                    <p style="text-align: center">
                      Resit Pembayaran
                    </p>
                    <table width="100%" border="1" cellpadding="5" cellspacing="0">
                      <tr>
                        <th width="30%" style="text-align: left">{{ $type }}</th>
                        <td>RM {{ $price }}</td>
                      </tr>
                      <tr>
                        <th width="30%" style="text-align: left">Bilangan Peserta</th>
                        <td>{{ $participant }}</td>
                      </tr>
                      @if(!empty($other_price))
                        <tr>
                          <th width="30%" style="text-align: left">Caj Permit</th>
                          <td>RM {{ $other_price }}</td>
                        </tr>
                      @endif
                      <tr>
                        <th width="30%" style="text-align: left">Total</th>
                        <td>RM {{ $amount }}</td>
                      </tr>
                    </table>
                  @endif
                </td>
              </tr>
              <!-- COPY -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>    
</body>
</html>
 --}}