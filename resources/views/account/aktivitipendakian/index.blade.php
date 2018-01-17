@extends('account.layouts.backend.panel')

@section('content')
	@if(session()->has('status'))
		@if(session()->get('status') == 'failed')
			<div class="alert alert-danger">Failed</div>
		@elseif(session()->get('status') == 'failed-capacity')
			<div class="alert alert-danger">Gagal, Jumlah bilangan peserta melebihi batas maksimum</div>
		@endif
	@endif
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Aktiviti Pendakian</h4>
			<p class="category">Borang permohonan Aktiviti Pendakian</p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('account/member-aktiviti-pendakian'), 'method' => 'POST']) }}
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
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="form-control select2" name="state" id="state" data-placeholder="Pilih Negeri">
												<option></option>
												@foreach($states as $state)
													<option value="{{ $state->id }}">{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('state'))
												<span class="help-error">{{ $errors->first('state') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('area') ? ' has-error' : '') }}">
											<label class="control-label">Daerah <small><i>Area</i></small></label>
											<select class="form-control select2" name="area" id="area" data-placeholder="Pilih Daerah">
												<option></option>
											</select>
											@if($errors->has('area'))
												<span class="help-error">{{ $errors->first('area') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									{{-- <div class="col-md-6">
										<div class="form-group{{ ($errors->has('permanent_forest') ? ' has-error' : '') }}">
											<label class="control-label">Hutan Simpan Kekal</label>
											<select class="form-control select2" name="permanent_forest" id="permanent_forest" data-placeholder="Pilih Hutan Simpan Kekal">
												
											</select>
											@if($errors->has('permanent_forest'))
												<span class="help-error">{{ $errors->first('permanent_forest') }}</span>
											@endif
										</div>
									</div> --}}
									<div class="col-md-12">
										<div class="form-group{{ ($errors->has('mountain') ? ' has-error' : '') }}">
											<label class="control-label">Nama Gunung <small><i>Mountain Name</i></small></label>
											<select class="form-control select2" name="mountain" id="mountain" data-placeholder="Pilih Gunung">
												
											</select>
											@if($errors->has('mountain'))
												<span class="help-error">{{ $errors->first('mountain') }}</span>
											@endif
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('starting_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Mula <small><i>Starting Date</i></small></label>
											<input type="text" class="form-control hikingdate" name="starting_date" id="starting_date" value="{{ request()->old('starting_date') }}">
											@if($errors->has('starting_date'))
												<span class="help-error">{{ $errors->first('starting_date') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('ending_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Akhir <small><i>Ending Date</i></small></label>
											<input type="text" class="form-control" name="ending_date" id="ending_date" value="{{ request()->old('ending_date') }}" readonly>
											@if($errors->has('ending_date'))
												<span class="help-error">{{ $errors->first('ending_date') }}</span>
											@endif
										</div>
									</div>
									{{-- <div class="col-md-6">

										<div class="form-group{{ ($errors->has('starting_time') ? ' has-error' : '') }}">
											<label class="control-label">Masa Mendaki <small><i>Hiking Time</i></small></label>
											<input type="text" class="form-control timepicker" name="starting_time" value="{{ request()->old('starting_time') }}">
											@if($errors->has('starting_time'))
												<span class="help-error">{{ $errors->first('starting_time') }}</span>
											@endif
										</div>
									</div> --}}
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Hari <small><i>Number of Days</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('day') }}" name="day" id="day" readonly>
											@if($errors->has('day'))
												<span class="help-error">{{ $errors->first('day') }}</span>
											@endif
										</div>
									</div>
								</div>
								<hr />
								<div id="campgroundDetail" style="display: none; margin-top: 15px; margin-bottom: 10px;">
									<table class="table table-bordered">
										<thead>
											<tr class="active">
												<th>Hari <small><i>Days</i></small></th>
												<th>Kem Tapak Perkhemahan <small><i>Camping Site Camp</i></small></th>
												{{-- <th>Bilangan Hari</th> --}}
											</tr>
										</thead>
										<tbody id="campgroundDetailData">

										</tbody>
									</table>

									<hr />
								</div>
								
								{{-- <div class="row">
									
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('arrival_time') ? ' has-error' : '') }}">
											<label class="control-label">Jangkauan Masa Turun <small><i>Expected Time Arrival</i></small></label>
											<input type="text" class="form-control timepicker" name="arrival_time" value="{{ request()->old('arrival_time') }}">
											@if($errors->has('arrival_time'))
												<span class="help-error">{{ $errors->first('arrival_time') }}</span>
											@endif
										</div>
									</div>
								</div> --}}
								<div class="form-group{{ ($errors->has('mountain_guide') ? ' has-error' : '') }}">
									<label class="control-label">Nama Malim Gunung <small><i>Name of Mountain Guide</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('mountain_guide') }}" name="mountain_guide">
									@if($errors->has('mountain_guide'))
										<span class="help-error">{{ $errors->first('mountain_guide') }}</span>
									@endif
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('participant') ? ' has-error' : '') }}">
											<label class="control-label">Jumlah Peserta <small><i>Participants</i></small></label>
											<select class="form-control select2" name="participant" id="participant" data-placeholder="Jumlah Peserta">
												
											</select>
											{{-- <input type="text" class="form-control" id="participant" name="participant"> --}}
											@if($errors->has('participant'))
												<span class="help-error">{{ $errors->first('participant') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jumlah Bayaran <small><i>Total</i></small> (RM)</label>
											<input type="text" class="form-control" value="0" readonly id="amount" name="amount">
										</div>
									</div>
								</div>
								{{-- <div class="form-group">
									<label class="control-label">Terma dan Syarat <small><i>Term & Conditions</i></small></label>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div> --}}
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
								<div class="form-group{{ ($errors->has('hiker_fullname') ? ' has-error' : '') }}">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('hiker_fullname') }}" id="hiker_fullname" name="hiker_fullname">
									@if($errors->has('hiker_fullname'))
										<span class="help-error">{{ $errors->first('hiker_fullname') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('hiker_nationality') ? ' has-error' : '') }}">
									<label class="control-label"><input type="checkbox" id="hiker_nationality" name="hiker_nationality" value="1"> Warganegara <small><i>Nationality</i></small></label>
									{{-- <input type="text" class="form-control" value="{{ request()->old('hiker_nationality') }}" name="hiker_nationality"> --}}
									@if($errors->has('hiker_nationality'))
										<span class="help-error">{{ $errors->first('hiker_nationality') }}</span>
									@endif
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('hiker_ic') ? ' has-error' : '') }}">
											<label class="control-label">No. KP/No. Passport <small><i>IC No./Passport No.</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('hiker_ic') }}" id="hiker_ic" name="hiker_ic">
											@if($errors->has('hiker_ic'))
												<span class="help-error">{{ $errors->first('hiker_ic') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('hiker_birthday') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Lahir <small><i>Date Of Birth</i></small></label>
											<input type="text" class="form-control datepicker" name="hiker_birthday" id="hiker_birthday" value="{{ request()->old('hiker_birthday') }}">
											@if($errors->has('hiker_birthday'))
												<span class="help-error">{{ $errors->first('hiker_birthday') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('hiker_gender') ? ' has-error' : '') }}">
											<label class="control-label">Jantina <small><i>Gender</i></small></label>
											<br />
											<input type="radio" name="hiker_gender" value="M" checked> Lelaki <small><i>Male</i></small>
											<br />
											<input type="radio" name="hiker_gender" value="W"> Perempuan <small><i>Female</i></small>
											@if($errors->has('hiker_gender'))
												<span class="help-error">{{ $errors->first('hiker_gender') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										
										<div class="form-group{{ ($errors->has('hiker_age') ? ' has-error' : '') }}">
											<label class="control-label">Umur <small><i>Age</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('hiker_age') }}" id="hiker_age" name="hiker_age">
											@if($errors->has('hiker_age'))
												<span class="help-error">{{ $errors->first('hiker_age') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group{{ ($errors->has('hiker_phone') ? ' has-error' : '') }}">
									<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('hiker_phone') }}" name="hiker_phone">
									@if($errors->has('hiker_phone'))
										<span class="help-error">{{ $errors->first('hiker_phone') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('hiker_address') ? ' has-error' : '') }}">
									<label class="control-label">Alamat Tempat Tinggal <small><i>Home Address</i></small></label>
									<textarea class="form-control" rows="3" name="hiker_address">{{ request()->old('hiker_address') }}</textarea>
									@if($errors->has('hiker_address'))
										<span class="help-error">{{ $errors->first('hiker_address') }}</span>
									@endif
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('hiker_state') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('hiker_state') }}" name="hiker_state">
											@if($errors->has('hiker_state'))
												<span class="help-error">{{ $errors->first('hiker_state') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('hiker_postcode') ? ' has-error' : '') }}">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('hiker_postcode') }}" name="hiker_postcode">
											@if($errors->has('hiker_postcode'))
												<span class="help-error">{{ $errors->first('hiker_postcode') }}</span>
											@endif
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
								<div class="form-group{{ ($errors->has('emergency_fullname') ? ' has-error' : '') }}">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('emergency_fullname') }}" name="emergency_fullname">
									@if($errors->has('emergency_fullname'))
										<span class="help-error">{{ $errors->first('emergency_fullname') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('emergency_phone') ? ' has-error' : '') }}">
									<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('emergency_phone') }}" name="emergency_phone">
									@if($errors->has('emergency_phone'))
										<span class="help-error">{{ $errors->first('emergency_phone') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('emergency_address') ? ' has-error' : '') }}">
									<label class="control-label">Alamat Tempat Tinggal <small><i>Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_address">{{ request()->old('emergency_address') }}</textarea>
									@if($errors->has('emergency_address'))
										<span class="help-error">{{ $errors->first('emergency_address') }}</span>
									@endif
								</div>
								<div class="form-group">
									<label class="control-label">Sekiranya Berbeza Daripada Alamat Pendaki <small><i>If Different From Hiker Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_second_address">{{ request()->old('emergency_second_address') }}</textarea>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('emergency_state') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('emergency_state') }}" name="emergency_state">
											@if($errors->has('emergency_state'))
												<span class="help-error">{{ $errors->first('emergency_state') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('emergency_postcode') ? ' has-error' : '') }}">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('emergency_postcode') }}" name="emergency_postcode">
											@if($errors->has('emergency_postcode'))
												<span class="help-error">{{ $errors->first('emergency_postcode') }}</span>
											@endif
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
									<input type="text" class="form-control" value="{{ request()->old('insurance_name') }}" name="insurance_name">
								</div>
								<div class="form-group">
									<label class="control-label">No. Polisi Insurans <small><i>No. Of Insurans Policies</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('insurance_code') }}" name="insurance_code">
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
										<td align="center"><input type="radio" name="healthy[treatment][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[treatment][status]" value="N" checked></td>
										<td><textarea class="form-control" name="healthy[treatment][note]" rows="2"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">2.</td>
										<td>Adakah anda pernah dimasukan ke hospital atas apa-apa penyakit? Jika ADA, sila nyatakan tarikh dan sebab. <i>Have you ever been hospitalized for any disease? If YES, pleas spesify the date and reason.</i></td>
										<td align="center"><input type="radio" name="healthy[hospital][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[hospital][status]" value="N" checked></td>
										<td><textarea class="form-control" name="healthy[hospital][note]" rows="2"></textarea></td>
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
										<td align="center"><input type="radio" name="healthy[blacked][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[blacked][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[blacked][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">2.</td>
										<td>Sawan dan Kelumpuhan <i>Fits/Epilepsy or Paralysis</i></td>
										<td align="center"><input type="radio" name="healthy[fits][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[fits][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[fits][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">3.</td>
										<td>Selalu Sakit Kepala <i>Frequent Headache/Migraine</i></td>
										<td align="center"><input type="radio" name="healthy[migraine][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[migraine][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[migraine][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">4.</td>
										<td>Kencing Manis <i>Diabetes</i></td>
										<td align="center"><input type="radio" name="healthy[diabetes][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[diabetes][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[diabetes][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">5.</td>
										<td>Tekanan Darah Tinggi/Tekanan Darah Rendah <i>High/Low Blood Pressure</i></td>
										<td align="center"><input type="radio" name="healthy[highblood][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[highblood][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[highblood][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">6.</td>
										<td>Penyakit Jantung dan Saluran Darah <i>Cardiovascular Diseases</i></td>
										<td align="center"><input type="radio" name="healthy[cardiovascular][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[cardiovascular][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[cardiovascular][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">7.</td>
										<td>Demam Berpanjangan <i>Prolonged Fever</i></td>
										<td align="center"><input type="radio" name="healthy[fever][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[fever][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[fever][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">8.</td>
										<td>Demam Kura <i>Malaria</i></td>
										<td align="center"><input type="radio" name="healthy[malaria][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[malaria][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[malaria][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">9.</td>
										<td>Lelah <i>Asthma</i></td>
										<td align="center"><input type="radio" name="healthy[asthma][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[asthma][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[asthma][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">10.</td>
										<td>Batuk Kering/Tibi/Radang Paru-paru <i>Dry Cough/Tuberculosis/Pneumoni</i></td>
										<td align="center"><input type="radio" name="healthy[drycough][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[drycough][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[drycough][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">11.</td>
										<td>Masalah Buang Pinggang/Kencing <i>Kedney/Urinary Problems</i></td>
										<td align="center"><input type="radio" name="healthy[urine][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[urine][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[urine][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">12.</td>
										<td>Pernah Mengalami Sebarang Pembedahan <i>Surgical Operation</i></td>
										<td align="center"><input type="radio" name="healthy[surgical][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[surgical][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[surgical][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">13.</td>
										<td>Pernah Mengalami Kecederaan Kepala/Anggota Batan Yang Teruk <i>Head/Limb Injuries</i></td>
										<td align="center"><input type="radio" name="healthy[limb][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[limb][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[limb][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">14.</td>
										<td>Kecacatan Anggota/Deria <i>Deformities-physical/sense</i></td>
										<td align="center"><input type="radio" name="healthy[deformities][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[deformities][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[deformities][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">15.</td>
										<td>Penyakit Kurang Darah/Masalah Pendarahan <i>Anaemia & Bleeding Disorders</i></td>
										<td align="center"><input type="radio" name="healthy[anaemia][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[anaemia][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[anaemia][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">16.</td>
										<td>Adakah Anda Merokok <i>Cigarette Smoking</i></td>
										<td align="center"><input type="radio" name="healthy[smoking][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[smoking][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[smoking][note]"></textarea></td>
									</tr>
									<tr>
										<td width="2%" valign="top" align="center">17.</td>
										<td>Lain-lain Penyakit Untuk Diberitahu <i>Other Illness</i></td>
										<td align="center"><input type="radio" name="healthy[other][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[other][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[other][note]"></textarea></td>
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
										<td align="center"><input type="radio" name="healthy[pregnant][status]" value="Y"></td>
										<td align="center"><input type="radio" name="healthy[pregnant][status]" value="N" checked></td>
										<td><textarea class="form-control" rows="2" name="healthy[pregnant][note]"></textarea></td>
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
							
								<div class="form-group{{ ($errors->has('declaration_name') ? ' has-error' : '') }}">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ auth()->guard('applicant')->user()->name }}" id="declaration_name" name="declaration_name" readonly>
									@if($errors->has('declaration_name'))
										<span class="help-error">{{ $errors->first('declaration_name') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('declaration_ic') ? ' has-error' : '') }}">
									<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
									<input type="text" class="form-control" value="{{ (auth()->guard('applicant')->user()->profile->citizen == '1' ? auth()->guard('applicant')->user()->profile->nokp : auth()->guard('applicant')->user()->profile->passport) }}" id="declaration_ic" name="declaration_ic" readonly>
									@if($errors->has('declaration_ic'))
										<span class="help-error">{{ $errors->first('declaration_ic') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('declaration_date') ? ' has-error' : '') }}">
									<label class="control-label">Tarikh <small><i>Date</i></small></label>
									<input type="text" class="form-control" value="{{ date('d/m/Y') }}" name="declaration_date" readonly>
									@if($errors->has('declaration_date'))
										<span class="help-error">{{ $errors->first('declaration_date') }}</span>
									@endif
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
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form7" aria-expanded="false" aria-controls="form7">
									G. TEMPAHAN KEMUDAHAN TER/HTN <small style="display: block; margin-left: 20px;"><i>FACILITIES RESERVE</i></small>
								</a>
							</h4>
						</div>
						<div id="form7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('type') ? ' has-error' : '') }}">
											<label class="control-label">TER/HTN <small><i>TER/HTN</i></small></label>
											<select class="form-control select2" name="type" id="type" data-placeholder="Pilih TER/HTN" style="width: 100%">
												<option></option>
												{{-- <option value="ter">Taman Eko-Rimba (TER)</option>
												<option value="htn">Hutan Taman Negeri (HTN)</option> --}}
											</select>
											@if($errors->has('type'))
												<span class="help-error">{{ $errors->first('type') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('eco_park') ? ' has-error' : '') }}">
											<label class="control-label">Nama TER/HTN <small><i>Name of TER/HTN</i></small></label>
											<select class="form-control select2" name="eco_park" id="eco_park" data-placeholder="Pilih Nama TER/HTN" style="width: 100%">
												<option></option>
											</select>
											@if($errors->has('eco_park'))
												<span class="help-error">{{ $errors->first('eco_park') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('convenience_category') ? ' has-error' : '') }}">
										<label class="control-label">Jenis Kemudahan <small><i>Convenience Type</i></small></label>
										<select class="form-control select2" name="convenience_category" id="convenience_category" data-placeholder="Pilih Jenis Kemudahan" style="width: 100%">
											<option></option>
											{{-- @foreach($convenience_categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach --}}
										</select>
										@if($errors->has('convenience_category'))
											<span class="help-error">{{ $errors->first('convenience_category') }}</span>
										@endif
									</div>
									<div id="peopledetail" style="display: none">
										<label style="display: block; margin-top: 15px">Jumlah Peserta <small><i>Participants Total</i></small></label>
										<div class="form-group">
											<label class="control-label">Kanak-kanak <small><i>Childrens</i></small></label>
											<input type="number" class="form-control" value="" id="children" name="children">
										</div>
										<div class="form-group">
											<label class="control-label">Pelajar <small><i>Student</i></small></label>
											<input type="number" class="form-control" value="" id="student" name="student">
										</div>
										<div class="form-group">
											<label class="control-label">Dewasa <small><i>Adult</i></small></label>
											<input type="number" class="form-control" value="" id="adult" name="adult">
										</div>
									</div>
									<div id="unitdetail" style="display: none">
										<div class="form-group">
											<label class="control-label">Unit <small><i>Unit</i></small></label>
											<input type="number" class="form-control" value="" id="unit" name="unit">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="unitdata" style="display: none">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="form-control select2" name="category" id="category" data-placeholder="Pilih Kategori" style="width: 100%">
												<option></option>
											</select>
											@if($errors->has('category'))
												<span class="help-error">{{ $errors->first('category') }}</span>
											@endif
										</div>
									</div>
									<div id="people" style="display: none">
										<div class="form-group{{ ($errors->has('nationality') ? ' has-error' : '') }}">
											<label class="control-label">Warganegara <small><i>Citizen</i></small></label>
											<select class="form-control select2" name="nationality" id="nationality" data-placeholder="Pilih Warganegara" style="width: 100%">
												<option></option>
												<option value="1">Warganegara</option>
												<option value="0">Bukan Warganegara</option>
											</select>
											@if($errors->has('nationality'))
												<span class="help-error">{{ $errors->first('nationality') }}</span>
											@endif
										</div>
									</div>
									<div id="pricing" style="display: none">
										<div class="form-group{{ ($errors->has('amount_convenience') ? ' has-error' : '') }}">
											<label class="control-label">Jumlah Harga <small><i>Total Price</i></small></label>
											<input type="hidden" id="price_convenience">
											<input type="text" class="form-control" value="" id="amount_convenience" name="amount_convenience" readonly>
											@if($errors->has('amount_convenience'))
												<span class="help-error">{{ $errors->first('amount_convenience') }}</span>
											@endif
										</div>
									</div>
								</div>
							</div>
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