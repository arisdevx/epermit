@extends('account.layouts.backend.panel')

@section('content')

	@if(session()->has('status'))
		@if(session()->get('status') == 'failed')
			<div class="alert alert-danger">Failed</div>
		@elseif(session()->get('status') == 'success')
			<div class="alert alert-success">Telah berjaya memperbarui data peserta</div>
		@endif
	@endif
	@if($errors->has('agreement'))
		<div class="alert alert-danger">{{ $errors->first('agreement') }}</div>
	@endif
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Aktiviti Pendakian</h4>
			<p class="category">Borang permohonan Aktiviti Pendakian</p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('account/member-aktiviti-pendakian/' . request()->segment(3) . '/' . request()->segment(4) . '/edit/update')]) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form2" aria-expanded="false" aria-controls="form2">
									B. MAKULMAT PENDAKI <small style="display: block; margin-left: 20px;"><i>DETAILS OF HIKER</i></small>
								</a>
							</h4>
						</div>
						<div id="form2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ $biodata->fullname }}" name="hiker_fullname">
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="control-label"><input type="checkbox" name="hiker_nationality" value="1"{{ ($biodata->nationality == '1' ? ' checked' : '') }}> Warganegara <small><i>Nationality</i></small></label>
										{{-- <input type="text" class="form-control" value="{{ $biodata->nationality }}" name="hiker_nationality"> --}}
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tarikh Lahir <small><i>Date Of Birth</i></small></label>
											<input type="text" class="form-control datepicker" name="hiker_birthday" value="{{ date('d/m/Y', strtotime($biodata->birthday)) }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Umur <small><i>Age</i></small></label>
											<input type="text" class="form-control" value="{{ $biodata->age }}" name="hiker_age">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jatina <small><i>Gender</i></small></label>
											<br />
											<input type="radio" name="hiker_gender" value="M"{{ $biodata->gender == 'M' ? ' checked' : '' }}> Lelaki <small><i>Male</i></small>
											<br />
											<input type="radio" name="hiker_gender" value="W"{{ $biodata->gender == 'W' ? ' checked' : '' }}> Perempuan <small><i>Female</i></small>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label">No. KP/No. Passport <small><i>IC No./Passport No.</i></small></label>
										<input type="text" class="form-control" value="{{ $biodata->ic_number }}" name="hiker_ic">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
									<input type="text" class="form-control" value="{{ $biodata->phone }}" name="hiker_phone">
								</div>
								<div class="form-group">
									<label class="control-label">Alamat Tempat Tinggal <small><i>Home Address</i></small></label>
									<textarea class="form-control" rows="3" name="hiker_address">{{ $biodata->address }}</textarea>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<input type="text" class="form-control" value="{{ $biodata->state }}" name="hiker_state">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ $biodata->postcode }}" name="hiker_postcode">
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
								<div class="form-group">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ $emergency->name }}" name="emergency_fullname">
								</div>
								<div class="form-group">
									<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
									<input type="text" class="form-control" value="{{ $emergency->phone }}" name="emergency_phone">
								</div>
								<div class="form-group">
									<label class="control-label">Alamat Tempat Tinggal <small><i>Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_address">{{ $emergency->address }}</textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Sekiranya Berbeza Daripada Alamat Pendaki <small><i>If Different From Hiker Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_second_address">{{ $emergency->second_address }}</textarea>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<input type="text" class="form-control" value="{{ $emergency->state }}" name="emergency_state">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ $emergency->postcode }}" name="emergency_postcode">
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
								<div class="form-group">
									<label class="control-label">Nama Syarikat Insurans <small><i>Name of Insurans Company</i></small></label>
									<input type="text" class="form-control" value="{{ $insurance->name }}" name="insurance_name">
								</div>
								<div class="form-group">
									<label class="control-label">No. Polisi Insurans <small><i>No. Of Insurans Policies</i></small></label>
									<input type="text" class="form-control" value="{{ $insurance->code }}" name="insurance_code">
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
										<td align="center"><input type="radio" name="healthy[treatment][status]" value="Y"{{ (getHealthy('treatment', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[treatment][status]" value="N"{{ (getHealthy('treatment', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" name="healthy[treatment][note]" rows="2">{{ getHealthy('treatment', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">2.</td>
										<td>Adakah anda pernah dimasukan ke hospital atas apa-apa penyakit? Jika ADA, sila nyatakan tarikh dan sebab. <i>Have you ever been hospitalized for any disease? If YES, pleas spesify the date and reason.</i></td>
										<td align="center"><input type="radio" name="healthy[hospital][status]" value="Y"{{ (getHealthy('hospital', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[hospital][status]" value="N"{{ (getHealthy('hospital', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" name="healthy[hospital][note]" rows="2">{{ getHealthy('hospital', $health->id)->notes }}</textarea></td>
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
										<td align="center"><input type="radio" name="healthy[blacked][status]" value="Y"{{ (getHealthy('blacked', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[blacked][status]" value="N"{{ (getHealthy('blacked', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[blacked][note]">{{ getHealthy('blacked', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">2.</td>
										<td>Sawan dan Kelumpuhan <i>Fits/Epilepsy or Paralysis</i></td>
										<td align="center"><input type="radio" name="healthy[fits][status]" value="Y"{{ (getHealthy('fits', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[fits][status]" value="N"{{ (getHealthy('fits', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[fits][note]">{{ getHealthy('fits', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">3.</td>
										<td>Selalu Sakit Kepala <i>Frequent Headache/Migraine</i></td>
										<td align="center"><input type="radio" name="healthy[migraine][status]" value="Y"{{ (getHealthy('migraine', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[migraine][status]" value="N"{{ (getHealthy('migraine', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[migraine][note]">{{ getHealthy('migraine', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">4.</td>
										<td>Kencing Manis <i>Diabetes</i></td>
										<td align="center"><input type="radio" name="healthy[diabetes][status]" value="Y"{{ (getHealthy('diabetes', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[diabetes][status]" value="N"{{ (getHealthy('diabetes', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[diabetes][note]">{{ getHealthy('diabetes', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">5.</td>
										<td>Tekanan Darah Tinggi/Tekanan Darah Rendah <i>High/Low Blood Pressure</i></td>
										<td align="center"><input type="radio" name="healthy[highblood][status]" value="Y"{{ (getHealthy('highblood', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[highblood][status]" value="N"{{ (getHealthy('highblood', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[highblood][note]">{{ getHealthy('highblood', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">6.</td>
										<td>Penyakit Jantung dan Saluran Darah <i>Cardiovascular Diseases</i></td>
										<td align="center"><input type="radio" name="healthy[cardiovascular][status]" value="Y"{{ (getHealthy('cardiovascular', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[cardiovascular][status]" value="N"{{ (getHealthy('cardiovascular', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[cardiovascular][note]">{{ getHealthy('cardiovascular', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">7.</td>
										<td>Demam Berpanjangan <i>Prolonged Fever</i></td>
										<td align="center"><input type="radio" name="healthy[fever][status]" value="Y"{{ (getHealthy('fever', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[fever][status]" value="N"{{ (getHealthy('fever', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[fever][note]">{{ getHealthy('fever', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">8.</td>
										<td>Demam Kura <i>Malaria</i></td>
										<td align="center"><input type="radio" name="healthy[malaria][status]" value="Y"{{ (getHealthy('malaria', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[malaria][status]" value="N"{{ (getHealthy('malaria', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[malaria][note]">{{ getHealthy('malaria', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">9.</td>
										<td>Lelah <i>Asthma</i></td>
										<td align="center"><input type="radio" name="healthy[asthma][status]" value="Y"{{ (getHealthy('asthma', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[asthma][status]" value="N"{{ (getHealthy('asthma', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[asthma][note]">{{ getHealthy('asthma', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">10.</td>
										<td>Batuk Kering/Tibi/Radang Paru-paru <i>Dry Cough/Tuberculosis/Pneumoni</i></td>
										<td align="center"><input type="radio" name="healthy[drycough][status]" value="Y"{{ (getHealthy('drycough', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[drycough][status]" value="N"{{ (getHealthy('drycough', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[drycough][note]">{{ getHealthy('drycough', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">11.</td>
										<td>Masalah Buang Pinggang/Kencing <i>Kedney/Urinary Problems</i></td>
										<td align="center"><input type="radio" name="healthy[urine][status]" value="Y"{{ (getHealthy('urine', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[urine][status]" value="N"{{ (getHealthy('urine', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[urine][note]">{{ getHealthy('urine', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">12.</td>
										<td>Pernah Mengalami Sebarang Pembedahan <i>Surgical Operation</i></td>
										<td align="center"><input type="radio" name="healthy[surgical][status]" value="Y"{{ (getHealthy('surgical', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[surgical][status]" value="N"{{ (getHealthy('surgical', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[surgical][note]">{{ getHealthy('surgical', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">13.</td>
										<td>Pernah Mengalami Kecederaan Kepala/Anggota Batan Yang Teruk <i>Head/Limb Injuries</i></td>
										<td align="center"><input type="radio" name="healthy[limb][status]" value="Y"{{ (getHealthy('limb', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[limb][status]" value="N"{{ (getHealthy('limb', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[limb][note]">{{ getHealthy('limb', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">14.</td>
										<td>Kecacatan Anggota/Deria <i>Deformities-physical/sense</i></td>
										<td align="center"><input type="radio" name="healthy[deformities][status]" value="Y"{{ (getHealthy('deformities', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[deformities][status]" value="N"{{ (getHealthy('deformities', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[deformities][note]">{{ getHealthy('deformities', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">15.</td>
										<td>Penyakit Kurang Darah/Masalah Pendarahan <i>Anaemia & Bleeding Disorders</i></td>
										<td align="center"><input type="radio" name="healthy[anaemia][status]" value="Y"{{ (getHealthy('anaemia', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[anaemia][status]" value="N"{{ (getHealthy('anaemia', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[anaemia][note]">{{ getHealthy('anaemia', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">16.</td>
										<td>Adakah Anda Merokok <i>Cigarette Smoking</i></td>
										<td align="center"><input type="radio" name="healthy[smoking][status]" value="Y"{{ (getHealthy('smoking', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[smoking][status]" value="N"{{ (getHealthy('smoking', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[smoking][note]">{{ getHealthy('smoking', $health->id)->notes }}</textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">17.</td>
										<td>Lain-lain Penyakit Untuk Diberitahu <i>Other Illness</i></td>
										<td align="center"><input type="radio" name="healthy[other][status]" value="Y"{{ (getHealthy('other', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[other][status]" value="N"{{ (getHealthy('other', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[other][note]">{{ getHealthy('other', $health->id)->notes }}</textarea></td>
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
										<td align="center"><input type="radio" name="healthy[pregnant][status]" value="Y"{{ (getHealthy('pregnant', $health->id)->status == 'Y' ? ' checked' : '') }}></td>
										<td align="center"><input type="radio" name="healthy[pregnant][status]" value="N"{{ (getHealthy('pregnant', $health->id)->status == 'N' ? ' checked' : '') }}></td>
										<td><textarea class="form-control" rows="2" name="healthy[pregnant][note]">{{ getHealthy('pregnant', $health->id)->notes }}</textarea></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form6" aria-expanded="false" aria-controls="form6">
									F. PERAKUAN DAN KEBENARAN PENDAKI <small style="display: block; margin-left: 20px;"><i>HIKER DECLARATION</i></small>
								</a>
							</h4>
						</div>
						<div id="form6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<p><b>Pengakuan dan Kebenaran Pendaki</b> <i>Hiker Acknowledgement</i></p>
								<p>Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pendaki semasa menjalankan aktiviti adalah tanggungjawab sendiri.</p>
								<p><i>I acknowledge that the information provided above is true. The government will not be held responsible if there are any difficulties that arise from incorrect information. The safety of hiker while conducting activities the responsibility of its own</i></p>
							
								<div class="form-group">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ $declaration->fullname }}" name="declaration_name">
								</div>
								<div class="form-group">
									<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
									<input type="text" class="form-control" value="{{ $declaration->ic_number }}" name="declaration_ic">
								</div>
								<div class="form-group">
									<label class="control-label">Tarikh <small><i>Date</i></small></label>
									<input type="text" class="form-control datepicker" value="{{ date('d/m/Y', strtotime($declaration->date)) }}" name="declaration_date">
								</div>

								<p><b>Nota: Permohonan perlu dikemukakan tiga (3) minggu sebelum tarikh pendakian dilakukan kepada Jabatan Perhutanan Negeri.</b></p>
								<p><i>Notes: Application must be submitted three (3) week before the date of hiking activities to the State Forestry Department.</i></p>
								<label>
									<input type="checkbox" name="agreement">&nbsp;Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar.
									@if($errors->has('agreement'))
										<span class="help-error" style="display: block; color: red">{{ $errors->first('agreement') }}</span>
									@endif
								</label>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" id="setApplication" class="btn btn-primary pull-right">Mohon<div class="ripple-container"></div></button>
				<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('account.partials.script.applicant')
@endsection

@if(session()->has('status'))
	@if(session()->get('status') == 'success')
		@section('modal')
			@include('account.partials.modal.application')
		@endsection
	@endif
@endif