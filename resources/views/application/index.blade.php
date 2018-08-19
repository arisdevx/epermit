@extends('account.layouts.backend.panel')

@section('content')

	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Permohonan Program</h4>
			<p class="category">Borang permohonan program</p>
		</div>

		<div class="card-content">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#form1" aria-expanded="true" aria-controls="collapseOne">
								A. MAKLUMAT PENDAKIAN <small style="display: block; margin-left: 20px;"><i>INFORMATION OF HIKING ACTIVITIES</i></small>
							</a>
						</h4>
					</div>
					<div id="form1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div class="form-group label-floating">
								<label class="control-label">Tempat Pendakian <small><i>Hiking Location</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Laluan Masuk <small><i>Enterance Route</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Laluan Turun <small><i>Exit Route</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Tarikh Mula <small><i>Starting Date</i></small></label>
										<input type="text" class="form-control datepicker" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Masa Mendaki <small><i>Hiking Time</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Tarikh Tamat <small><i>Ending Date</i></small></label>
										<input type="text" class="form-control datepicker" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Jangkauan Masa Turun <small><i>Expected Time Arrival</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Nama Malim Gunung <small><i>Name of Mountain Guide</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<br />
							<p>* Sila Sertakan Tentatif Perjalanan Aktiviti Pendakian Termasuk Lokasi Tapak Perkhemahan Untuk Bermalam</p>
							<p>* <i>Please attach the hiking activities tentative including camping site for overnite</i></p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form2" aria-expanded="false" aria-controls="form2">
								B. MAKULMAT PENDAKI <small style="display: block; margin-left: 20px;"><i>DETAILS OF HIKER</i></small>
							</a>
						</h4>
					</div>
					<div id="form2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<div class="form-group label-floating">
								<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">No. KP/No. Passport <small><i>IC No./Passport No.</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Tarikh Lahir <small><i>Date Of Birth</i></small></label>
										<input type="text" class="form-control datepicker" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Umur <small><i>Age</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Jatina <small><i>Gender</i></small></label>
										<br />
										<input type="radio" name=""> Lelaki <small><i>Male</i></small>
										<br />
										<input type="radio" name=""> Perempuan <small><i>Female</i></small>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Warganegara <small><i>Nationality</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Alamat Tempat Tinggal <small><i>Home Address</i></small></label>
								<textarea class="form-control" rows="3"></textarea>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Negeri <small><i>State</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Poskod <small><i>Postcode</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form3" aria-expanded="false" aria-controls="form3">
								C. MAKLUMAT ORANG UNTUK DIHUBUNGI JIKA BERLAKU KECEMASAN <small style="display: block; margin-left: 20px;"><i>DETAILS OF EMERGENCY CONTACT PERSON</i></small>
							</a>
						</h4>
					</div>
					<div id="form3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<div class="form-group label-floating">
								<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Alamat Tempat Tinggal <small><i>Address</i></small></label>
								<textarea class="form-control" rows="3"></textarea>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Sekiranya Berbeza Daripada Alamat Pendaki <small><i>If Different From Hiker Address</i></small></label>
								<textarea class="form-control" rows="3"></textarea>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Negeri <small><i>State</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Poskod <small><i>Postcode</i></small></label>
										<input type="text" class="form-control" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form4" aria-expanded="false" aria-controls="form4">
								D. MAKLUMAT POLISI INSURANS <small style="display: block; margin-left: 20px;"><i>DETAILS OF INSURANS POLICIES</i></small>
							</a>
						</h4>
					</div>
					<div id="form4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<div class="form-group label-floating">
								<label class="control-label">Nama Syarikat Insurans <small><i>Name of Insurans Company</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">No. Polisi Insurans <small><i>No. Of Insurans Policies</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form5" aria-expanded="false" aria-controls="form5">
								E. MAKLUMAT KESIHATAN PENDAKI <small style="display: block; margin-left: 20px;"><i>DETAILS OF HIKER HEALTH</i></small>
							</a>
						</h4>
					</div>
					<div id="form5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<p>
								<b>Pendaki dikehendaki menjawab semua soalan di bawah pada petak yang berkaitan</b><br />
								<i>Please read the questions carefully and answer each one honestly: </i>
							</p>
							<table class="table">
								<tr>
									<th colspan="2">Bahagian 1 <i>Part 1</i></th>
									<th align="center" style="text-align: center;">Ada <i>Yes</i></th>
									<th align="center" style="text-align: center;">Tidak <i>No</i></th>
									<th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">1.</td>
									<td>Adakah anda sedang menerima rawatan? Jika ada sila nyatakan. <i>Are you under treatment? If YES, please spesify</i></td>
									<td align="center"><input type="radio" name="treatment"></td>
									<td align="center"><input type="radio" name="treatment"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">2.</td>
									<td>Adakah anda pernah dimasukan ke hospital atas apa-apa penyakit? Jika ADA, sila nyatakan tarikh dan sebab. <i>Have you ever been hospitalized for any disease? If YES, pleas spesify the date and reason.</i></td>
									<td align="center"><input type="radio" name="hospital"></td>
									<td align="center"><input type="radio" name="hospital"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<th colspan="2">Bahagian 2 (Pernah anda mengalami situasi berikut?)<i>Part 1 (Have you experienced the following situation?)</i></th>
									<th align="center" style="text-align: center;">Ada <i>Yes</i></th>
									<th align="center" style="text-align: center;">Tidak <i>No</i></th>
									<th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">1.</td>
									<td>Masalah pening, pitam atau pengsan <i>Dizziness, blacked or paralysis</i></td>
									<td align="center"><input type="radio" name="blacked"></td>
									<td align="center"><input type="radio" name="blacked"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">2.</td>
									<td>Sawan dan Kelumpuhan <i>Fits/Epilepsy or Paralysis</i></td>
									<td align="center"><input type="radio" name="fits"></td>
									<td align="center"><input type="radio" name="fits"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">3.</td>
									<td>Selalu Sakit Kepala <i>Frequent Headache/Migraine</i></td>
									<td align="center"><input type="radio" name="migraine"></td>
									<td align="center"><input type="radio" name="migraine"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">4.</td>
									<td>Kencing Manis <i>Diagetes</i></td>
									<td align="center"><input type="radio" name="diabetes"></td>
									<td align="center"><input type="radio" name="diabetes"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">5.</td>
									<td>Tekanan Darah Tinggi/Tekanan Darah Rendah <i>High/Low Blood Pressure</i></td>
									<td align="center"><input type="radio" name="highblood"></td>
									<td align="center"><input type="radio" name="highblood"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">6.</td>
									<td>Penyakit Jantung dan Saluran Darah <i>Cardiovascular Diseases</i></td>
									<td align="center"><input type="radio" name="cardiovascular"></td>
									<td align="center"><input type="radio" name="cardiovascular"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">7.</td>
									<td>Demam Berpanjangan <i>Prolonged Fever</i></td>
									<td align="center"><input type="radio" name="fever"></td>
									<td align="center"><input type="radio" name="fever"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">8.</td>
									<td>Demam Kura <i>Malaria</i></td>
									<td align="center"><input type="radio" name="malaria"></td>
									<td align="center"><input type="radio" name="malaria"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">9.</td>
									<td>Lelah <i>Asthma</i></td>
									<td align="center"><input type="radio" name="asthma"></td>
									<td align="center"><input type="radio" name="asthma"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">10.</td>
									<td>Batuk Kering/Tibi/Radang Paru-paru <i>Dry Cough/Tuberculosis/Pneumoni</i></td>
									<td align="center"><input type="radio" name="drycough"></td>
									<td align="center"><input type="radio" name="drycough"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">11.</td>
									<td>Masalah Buang Pinggang/Kencing <i>Kedney/Urinary Problems</i></td>
									<td align="center"><input type="radio" name="urine"></td>
									<td align="center"><input type="radio" name="urine"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">12.</td>
									<td>Pernah Mengalami Sebarang Pembedahan <i>Surgical Operation</i></td>
									<td align="center"><input type="radio" name="surgical"></td>
									<td align="center"><input type="radio" name="surgical"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">13.</td>
									<td>Pernah Mengalami Kecederaan Kepala/Anggota Batan Yang Teruk <i>Head/Limb Injuries</i></td>
									<td align="center"><input type="radio" name="limb"></td>
									<td align="center"><input type="radio" name="limb"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">14.</td>
									<td>Kecacatan Anggota/Deria <i>Deformities-physical/sense</i></td>
									<td align="center"><input type="radio" name="deformities"></td>
									<td align="center"><input type="radio" name="deformities"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">15.</td>
									<td>Penyakit Kurang Darah/Masalah Pendarahan <i>Anaemia & Bleeding Disorders</i></td>
									<td align="center"><input type="radio" name="anaemia"></td>
									<td align="center"><input type="radio" name="anaemia"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">16.</td>
									<td>Adakah Anda Merokok <i>Cigarette Smoking</i></td>
									<td align="center"><input type="radio" name="smoking"></td>
									<td align="center"><input type="radio" name="smoking"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">17.</td>
									<td>Lain-lain Penyakit Untuk Diberitahu <i>Other Illness</i></td>
									<td align="center"><input type="radio" name="illness"></td>
									<td align="center"><input type="radio" name="illness"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
								<tr>
									<th colspan="2">Untuk Wanita <i>Women Only</i></th>
									<th align="center" style="text-align: center;">Ada <i>Yes</i></th>
									<th align="center" style="text-align: center;">Tidak <i>No</i></th>
									<th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
								</tr>
								<tr>
									<td width="2%" valign="top" align="center">18.</td>
									<td>Mengandung <i>Pregnant</i></td>
									<td align="center"><input type="radio" name="pregnant"></td>
									<td align="center"><input type="radio" name="pregnant"></td>
									<td><textarea class="form-control" rows="2"></textarea></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form6" aria-expanded="false" aria-controls="form6">
								F. PERAKUAN PENDAKI <small style="display: block; margin-left: 20px;"><i>HIKER DECLARATION</i></small>
							</a>
						</h4>
					</div>
					<div id="form6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<p><b>Pengakuan dan Kebenaran Pendaki</b> <i>Hiker Acknowledgement</i></p>
							<p>Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pendaki semasa menjalankan aktiviti adalah tanggungjawab sendiri.</p>
							<p><i>I acknowledge that the information provided above is true. The government will not be held responsible if there are any difficulties that arise from incorrect information. The safety of hiker while conducting activities the responsibility of its own</i></p>
						
							<div class="form-group label-floating">
								<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
								<input type="text" class="form-control" value="">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Tarikh <small><i>Date</i></small></label>
								<input type="text" class="form-control datepicker" value="">
							</div>

							<p><b>Nota: Permohonan perlu dikemukakan tiga (3) minggu sebelum tarikh pendakian dilakukan kepada Jabatan Perhutanan Negeri.</b></p>
							<p><i>Notes: Application must be submitted three (3) week before the date of hiking activities to the State Forestry Department.</i></p>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="setApplication" class="btn btn-primary pull-right">Mohon<div class="ripple-container"></div></button>
			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('scripts')
	@include('account.partials.script.application')
@endsection
@section('modal')
	@include('account.partials.modal.application')
@endsection