<div>
	<p>{{ $code_number }}</p>
	<p style="text-align: right;">TARIKH: {{ date('d M Y') }}</p>
	<p>{{ $full_name }},</p>
	<p>Terima kasih kerana menggunakan Sistem ECO-JPSM.</p>
	<p style="margin-bottom: 20px;">Permohonan anda telah diterima dan sedang diproses.</p>
	<p style="margin-bottom: 20px;">RINGKASAN PERMOHONAN:</p>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<th style="width: 40%; text-align: left;">NO. PERMOHONAN</th>
			<td>{{ strtoupper($code_number) }}</td>
		</tr>
		<tr>
			<th style="width: 40%; text-align: left;">TARIKH PERMOHONAN</th>
			<td>{{ strtoupper($applicant_date) }}</td>
		</tr>
		<tr>
			<th style="width: 40%; text-align: left;">KATEGORI PERMOHONAN</th>
			<td>PENDAKIAN GUNUNG</td>
		</tr>
		<tr>
			<th style="width: 40%; text-align: left;">LOKASI PENDAKIAN</th>
			<td>{{ strtoupper($mountain) }}</td>
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
			<th style="width: 40%; text-align: left;">BILANGAN PESERTA</th>
			<td>{{ strtoupper($participant) }} ORANG</td>
		</tr>
		<tr>
			<th style="width: 40%; text-align: left;">BILANGAN MALIM GUNUNG</th>
			<td>{{ strtoupper($guide) }} ORANG</td>
		</tr>
		<tr>
			<th style="width: 40%; text-align: left;">STATUS PERMOHONAN</th>
			<td>DITERIMA DAN DIPROSES</td>
		</tr>
	</table>
	<p style="margin-top: 20px; margin-bottom: 30px;">Sekian, Terima kasih</p>
	<p style="text-align: center;"><i>*cetakan ini adalah berkomputer dan tidak memerlukan tandatangan</i></p>
</div>