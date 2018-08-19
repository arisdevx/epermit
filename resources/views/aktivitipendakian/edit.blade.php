@extends('layouts.panel')

@section('content')

	@if(session()->has('status'))
		@if(session()->get('status') == 'failed')
			<div class="alert alert-danger">Failed</div>
		@endif
	@endif
	@if($errors->has('agreement'))
		<div class="alert alert-danger">{{ $errors->first('agreement') }}</div>
	@endif
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Borang Permohonan Aktiviti Pendakian <i>Climbing Activity Application Form</i></h4>
			<p class="category">Aktiviti Pendakian <i>Climbing Activities</i></p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('aktiviti-pendakian/' . request()->segment(2)), 'method' => 'PUT']) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#form1" aria-expanded="true" aria-controls="collapseOne">
									A. MAKLUMAT PENDAKIAN <small style="display: block; margin-left: 20px;"><i>INFORMATION OF HIKING ACTIVITIES</i></small>
								</a>
							</h4>
						</div>
						<div id="form1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="form-control selectpicker" title="Negeri" data-live-search="true" name="state" id="state" data-dropup-auto="false">
												@foreach($states as $state)
													<option data-tokens="{{ $state->name }}" value="{{ $state->id }}"{{ ($state->id == $location->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Daerah <small><i>Area</i></small></label>
											<select class="form-control selectpicker" title="Daerah" data-live-search="true" name="area" id="area" data-dropup-auto="false">
												@foreach($areas as $area)
													<option data-tokens="{{ $area->name }}" value="{{ $area->id }}"{{ ($area->id == $location->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('mountain') ? ' has-error' : '') }}">
											<label class="control-label">Nama Gunung <small><i>Mountain Name</i></small></label>
											<select class="form-control selectpicker" title="Nama Gunung" name="mountain" id="mountain" data-live-search="true" data-dropup-auto="false">
												@foreach($mountains as $mountain)
													<option value="{{ $mountain->id }}"{{ ($mountain->id == $information->mountain_id ? ' selected' : '') }}>{{ $mountain->name }}</option>
												@endforeach
											</select>
											@if($errors->has('mountain'))
												<span class="help-error">{{ $errors->first('mountain') }}</span>
											@endif
										</div>
									</div>
								</div>
								{{-- <div class="row"> --}}
									{{-- DISABLED <div class="col-md-6">
										<div class="form-group{{ ($errors->has('permanent_forest') ? ' has-error' : '') }}">
											<label class="control-label">Hutan Simpan Kekal</label>
											<select class="form-control select2" name="permanent_forest" id="permanent_forest" data-placeholder="Pilih Hutan Simpan Kekal">
												@foreach($forests as $forest)
													<option value="{{ $forest->id }}"{{ ($forest->id == $information->permanent_forest_id ? ' selected' : '') }}>{{ $forest->name }}</option>
												@endforeach
											</select>
											@if($errors->has('permanent_forest'))
												<span class="help-error">{{ $errors->first('permanent_forest') }}</span>
											@endif
										</div>
									</div> --}}
									{{-- <div class="col-md-12">
										<div class="form-group{{ ($errors->has('mountain') ? ' has-error' : '') }}">
											<label class="control-label">Nama Gunung <small><i>Mountain Name</i></small></label>
											<select class="form-control selectpicker" title="Nama Gunung" name="mountain" id="mountain" data-live-search="Pilih Gunung">
												@foreach($mountains as $mountain)
													<option value="{{ $mountain->id }}"{{ ($mountain->id == $information->mountain_id ? ' selected' : '') }}>{{ $mountain->name }}</option>
												@endforeach
											</select>
											@if($errors->has('mountain'))
												<span class="help-error">{{ $errors->first('mountain') }}</span>
											@endif
										</div>
									</div> --}}
								{{-- </div> --}}
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('starting_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Mula Pendakian<small><i>Start Date of the Climb</i></small></label>
											<input type="text" class="form-control hikingdate" name="starting_date" id="starting_date" value="{{ date('d/m/Y', strtotime($information->starting_date)) }}">
											@if($errors->has('starting_date'))
												<span class="help-error">{{ $errors->first('starting_date') }}</span>
											@endif
											<small>Tarikh mula pendakian adalah sekurang-kurangnya 14 hari daripada tarikh permohonan<br><i>Climbing start date is at least 14 days from the date of application</i> </small>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('ending_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Akhir Pendakian<small><i>End Date of the Climb</i></small></label>
											<input type="text" class="form-control" name="ending_date" id="ending_date" value="{{ date('d/m/Y', strtotime($information->ending_date)) }}" readonly>
											@if($errors->has('ending_date'))
												<span class="help-error">{{ $errors->first('ending_date') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Hari <small><i>Number of Days</i></small></label>
											<input type="text" class="form-control" value="{{ $information->day }}" name="day" id="day" readonly>
											@if($errors->has('day'))
												<span class="help-error">{{ $errors->first('day') }}</span>
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
								{{-- <div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Hari <small><i>Number of Days</i></small></label>
											<input type="text" class="form-control" value="{{ $information->day }}" name="day" id="day" readonly>
											@if($errors->has('day'))
												<span class="help-error">{{ $errors->first('day') }}</span>
											@endif
										</div>
									</div> --}}
									{{-- <div class="col-md-6">
										
									</div> --}}
								{{-- </div> --}}
								
								{{-- <div id="campgroundDetail" style="margin-top: 15px; margin-bottom: 10px;">
									<table class="table table-bordered">
										<thead>
											<tr class="active">
												<th>Hari <small><i>Days</i></small></th>
												<th>Kem Tapak Perkhemahan <small><i>Camping Site Camp</i></small></th>
											</tr>
										</thead>
										<tbody id="campgroundDetailData">
											@php($days = config('days'))
											@if($mountain_selected->campground == 'Y')
												@if(!$campgrounds->isEmpty())
													@php($i = 1)
													@foreach($campgrounds as $campground)
														<tr>
															<td width="20%">{{ (!empty($days[$i]) ? $days[$i] : '-') }}</td>
															<td>{{ (!empty($campground->mountain_campground->name) ? $campground->mountain_campground->name : '-') }}</td>
														</tr>
														@php($i++)
													@endforeach
												@else
													<tr>
														<td colspan="3" align="center">Tiada</td>
													</tr>
												@endif
											@else
												<tr class="active">
													<td colspan="3" align="center">Tiada</td>
												</tr>
											@endif
										</tbody>
									</table>
									<hr />
								</div> --}}
								{{-- <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tarikh Mula <small><i>Starting Date</i></small></label>
											<input type="text" class="form-control datepicker" name="starting_date" id="starting_date" value="{{ date('d/m/Y', strtotime($information->starting_date)) }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Masa Mendaki <small><i>Hiking Time</i></small></label>
											<input type="text" class="form-control timepicker" name="starting_time" value="{{ date('H:i', strtotime($information->starting_time)) }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tarikh Tamat <small><i>Ending Date</i></small></label>
											<input type="text" class="form-control" name="ending_date" id="ending_date" value="{{ date('d/m/Y', strtotime($information->ending_date)) }}" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jangkauan Masa Turun <small><i>Expected Time Arrival</i></small></label>
											<input type="text" class="form-control timepicker" name="arrival_time" value="{{ date('H:i', strtotime($information->arrival_time)) }}">
										</div>
									</div>
								</div> --}}
								{{-- <div class="form-group">
									<label class="control-label">Nama Malim Gunung <small><i>Name of Mountain Guide</i></small></label>
									<input type="text" class="form-control" value="{{ $information->mountain_guide }}" name="mountain_guide">
								</div> --}}
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('participant') ? ' has-error' : '') }}">
											<label class="control-label">Jumlah Peserta <span style="color: red; font-weight: bold;" id="available_slot">Had peserta berbaki {{ $slots }} sahaja</span><small><i>Participants</i></small></label>
											<input type="number" class="form-control" name="participant" id="participant" name="" value="{{ $information->participants_total }}">
											{{-- <select class="form-control select2" name="participant" id="participant" data-placeholder="Jumlah Peserta">
												@for($i = 0; $i < count($slots); $i++)
													<option value="{{ $slots[$i]['id'] }}"{{ ($slots[$i]['id'] == $information->participants_total ? 'selected' : '') }}>{{ $slots[$i]['text'] }}</option>
												@endfor
											</select> --}}
											{{-- <input type="text" class="form-control" id="participant" name="participant"> --}}
											<p>*Jumlah peserta yang dimasukan termasuk jumlah ketua pendaki <br><i>*The number of participants included the total of climbers leader</i></p>

											<input type="hidden" id="available_slot_hidden" value="{{ $slots }}">
											@if($errors->has('participant'))
												<span class="help-error">{{ $errors->first('participant') }}</span>
											@endif

										</div>
										{{-- <div class="form-group">

											<label class="control-label">Jumlah Peserta <small><i>Participants</i></small></label>
											<input type="text" class="form-control" id="participant" value="{{ $information->participants_total }}" name="participant" readonly>
										</div> --}}
									</div>
									{{-- <div class="col-md-3">
										<div class="form-group">
											<label class="control-label"></label>
											<span style="margin-top: 25px;display: block" id="available_slot">{{ $slots }} Orang masih kosong</span>
										</div>
										<input type="hidden" id="available_slot_hidden" value="{{ $slots }}">
									</div> --}}
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Jumlah Bayaran (RM)<small><i>Total</i></small> </label>
											<input type="text" class="form-control" value="{{ $information->amount }}" readonly id="amount" name="amount">
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
								{{-- <p>* Sila Sertakan Tentatif Perjalanan Aktiviti Pendakian Termasuk Lokasi Tapak Perkhemahan Untuk Bermalam</p>
								<p>* <i>Please attach the hiking activities tentative including camping site for overnite</i></p> --}}
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form2" aria-expanded="false" aria-controls="form2">
									B. MAKLUMAT PENDAKI <small style="display: block; margin-left: 20px;"><i>DETAILS OF HIKER</i></small>
								</a>
							</h4>
						</div>
						<div id="form2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div class="form-group">
									<input type="checkbox" id="checkName"{{ (empty($biodata->fullname) ? ' checked' : '') }}> Saya adalah pendaki / pemilik akaun  <br><small style="display: block; margin-left: 17px;"><i>I am climber / account owner</i></small>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Penuh  <small><i>Full Name</i></small></label>
											<input type="text" class="form-control" value="{{ $biodata->fullname }}" name="hiker_fullname" {{ (empty($biodata->fullname) ? ' readonly' : '') }}>
										</div>
									</div>
									<input type="hidden" name="hiker_nationality" value="1">
									{{-- <div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-group" style="margin-top: 21px !important">
														<label class="control-label"><input type="radio" name="hiker_nationality" value="1"{{ ($biodata->nationality == '1' ? ' checked' : '') }}> Warganegara <small><i>Citizen</i></small></label>
													</div>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-group" style="margin-top: 21px !important">
														<label class="control-label"><input type="radio" name="hiker_nationality" value="0"{{ ($biodata->nationality == '0' ? ' checked' : '') }}> Bukan Warganegara <small><i>Non Citizen</i></small></label>
													</div>
													
												</div>
											</div>
										</div>
									</div> --}}
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<label class="control-label">No. KP/No. Passport <small><i>IC No./Passport No.</i></small></label>
										<input type="text" class="form-control" value="{{ $biodata->ic_number }}" name="hiker_ic" placeholder="891230101234" data-maxsize="12">
										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tarikh Lahir <small><i>Date Of Birth</i></small></label>
											<input type="text" class="form-control datepicker" name="hiker_birthday" value="{{ date('d/m/Y', strtotime($biodata->birthday)) }}">
										</div>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jantina <small><i>Gender</i></small></label>
											<select class="form-control selectpicker" title="Jantina" name="hiker_gender" id="hiker_gender" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option value="M"{{ $biodata->gender == 'M' ? ' selected' : '' }}>Lelaki / Male</option>
												<option value="W"{{ $biodata->gender == 'W' ? ' selected' : '' }}>Perempuan / Female</option>
											</select>
{{-- 											<br />
											<input type="radio" name="hiker_gender" value="M"{{ $biodata->gender == 'M' ? ' checked' : '' }}> Lelaki <small><i>Male</i></small>
											<br />
											<input type="radio" name="hiker_gender" value="W"{{ $biodata->gender == 'W' ? ' checked' : '' }}> Perempuan <small><i>Female</i></small> --}}
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
											<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
											<input type="number" class="form-control control-phone" value="{{ $biodata->phone }}" name="hiker_phone" data-maxsize="14">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Alamat Tempat Tinggal <small><i>Home Address</i></small></label>
									<textarea class="form-control" rows="3" name="hiker_address">{{ $biodata->address }}</textarea>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ $biodata->postcode }}" name="hiker_postcode" data-maxsize="5">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('hiker_state') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="form-control selectpicker" title="Negeri" name="hiker_state" id="hiker_state" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option></option>
												@foreach($states as $state)
													<option data-tokens="{{ $state->name }}" value="{{ $state->id }}"{{ ($biodata->state_id == $state->id ? ' selected' : '') }}>{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('hiker_state'))
												<span class="help-error">{{ $errors->first('hiker_state') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">

										<div class="form-group{{ ($errors->has('hiker_country') ? ' has-error' : '') }}">
											<label class="control-label">Negara <small><i>Country</i></small></label>
											<select class="form-control selectpicker" title="Negara" name="hiker_country" id="country" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option></option>
												@foreach($countries as $country)
													<option data-tokens="{{ $country->name }}" value="{{ $country->id }}"{{ ($biodata->country_id == $country->id ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
												@endforeach
											</select>
											@if($errors->has('hiker_country'))
												<span class="help-error">{{ $errors->first('hiker_country') }}</span>
											@endif
										</div>
									</div>
									
								</div>
								
								@if(empty($malim))
									@if($malim_ready < $malim_available)
										<div class="form-group">
											<label style="color: #000000">
												<input type="checkbox" name="guide"> Adakah anda sebagai Malim Gunung? <br><span style="display: block; margin-left: 20px !important;"><i>Are you as mountain guide?</i></span>
											</label>
										</div>
									@endif
								@else
									<div class="form-group">
										<label style="color: #000000">
											<input type="checkbox" name="guide" checked> Adakah anda sebagai Malim Gunung? <br><span style="display: block; margin-left: 20px !important;"><i>Are you as mountain guide?</i></span>
										</label>
									</div>
								@endif
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form3" aria-expanded="false" aria-controls="form3">
									C. MAKLUMAT ORANG UNTUK DIHUBUNGI JIKA BERLAKU KECEMASAN <small style="display: block; margin-left: 20px;"><i>DETAILS OF EMERGENCY CONTACT PERSON</i></small>
								</a>
							</h4>
						</div>
						<div id="form3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
											<input type="text" class="form-control" value="{{ $emergency->name }}" name="emergency_fullname">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group"{{ ($errors->has('emergency_relationship') ? ' has-error' : '') }}>
											<label class="control-label">Hubungan <small><i>Relationship</i></small></label>
											<select class="form-control selectpicker" name="emergency_relationship" title="Hubungan" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option disabled selected value>Hubungan</option>
												<option value="husband-wife"{{ ($emergency->relationship == 'husband-wife'? ' selected' : '') }}>Suami-Isteri / Husband-Wife</option>
												<option value="parents"{{ ($emergency->relationship == 'parents'? ' selected' : '') }}>Ibu-Bapa / Parents</option>
												<option value="siblings"{{ ($emergency->relationship == 'siblings'? ' selected' : '') }}>Adik-beradik / Siblings</option>
												<option value="others"{{ ($emergency->relationship == 'others'? ' selected' : '') }}>Lain-lain / Others</option>
											</select>
											@if($errors->has('emergency_relationship'))
												<span class="help-error">{{ $errors->first('emergency_relationship') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">No. Telefon <small><i>Telephone No.</i></small></label>
											<input type="number" class="form-control control-phone-emergency" value="{{ $emergency->phone }}" name="emergency_phone" data-maxsize="14">
										</div>
									</div>
								</div>
								<label for="checkAddress">
									<input type="checkbox" id="checkAddress"> Semak jika alamat berdaftar yang sama <br><i style="margin-left: 18px">Tick if sama registered address</i>
								</label>
								<div class="form-group">
									<label class="control-label">Alamat<small><i>Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_address" id="emergency_address">{{ $emergency->address }}</textarea>
								</div>
								{{-- <div class="form-group">
									<label class="control-label">Sekiranya Berbeza Daripada Alamat Pendaki <small><i>If Different From Hiker Address</i></small></label>
									<textarea class="form-control" rows="3" name="emergency_second_address">{{ $emergency->second_address }}</textarea>
								</div> --}}
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ $emergency->postcode }}" name="emergency_postcode">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('emergency_state') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="form-control selectpicker" title="Negeri" name="emergency_state" id="emergency_state" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option></option>
												@foreach($states as $state)
													<option data-tokens="{{ $state->name }}" value="{{ $state->id }}"{{ ($emergency->state_id == $state->id ? ' selected' : '') }}>{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('emergency_state'))
												<span class="help-error">{{ $errors->first('emergency_state') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">

										<div class="form-group{{ ($errors->has('emergency_country') ? ' has-error' : '') }}">
											<label class="control-label">Negara <small><i>Country</i></small></label>
											<select class="form-control selectpicker" title="Negara" name="emergency_country" id="country" data-live-search="true" style="width: 100%" data-dropup-auto="false">
												<option></option>
												@foreach($countries as $country)
													<option data-tokens="{{ $country->name }}" value="{{ $country->id }}"{{ ($emergency->country_id == $country->id ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
												@endforeach
											</select>
											@if($errors->has('emergency_country'))
												<span class="help-error">{{ $errors->first('emergency_country') }}</span>
											@endif
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form4" aria-expanded="false" aria-controls="form4">
									D. MAKLUMAT POLISI INSURANS <small style="display: block; margin-left: 20px;"><i>DETAILS OF INSURANS POLICIES</i></small>
								</a>
							</h4>
						</div>
						<div id="form4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Syarikat Insurans <small><i>Name of Insurans Company</i></small></label>
											<input type="text" class="form-control" value="{{ $insurance->name }}" name="insurance_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">No. Polisi Insurans <small><i>No. Of Insurans Policies</i></small></label>
											<input type="text" class="form-control" value="{{ $insurance->code }}" name="insurance_code">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
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
						<div class="panel-heading soft-green" role="tab">
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
									<input type="text" class="form-control" value="{{ $declaration->fullname }}" name="declaration_name" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
									<input type="text" class="form-control" value="{{ $declaration->ic_number }}" name="declaration_ic" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">Tarikh <small><i>Date</i></small></label>
									<input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($declaration->date)) }}" name="declaration_date" readonly>
								</div>

								<p><b>Nota: Permohonan perlu dikemukakan tiga (3) minggu sebelum tarikh pendakian dilakukan kepada Jabatan Perhutanan Negeri.</b></p>
								<p><i>Notes: Application must be submitted three (3) week before the date of hiking activities to the State Forestry Department.</i></p>
								<label>
									<input type="checkbox" name="agreement" style="color: #000000">&nbsp;<strong>Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar. <br><i style="margin-left: 17px">I acknowledge that all information given and presented in this system is true.</i></strong>
									@if($errors->has('agreement'))
										<span class="help-error" style="display: block; color: red">{{ $errors->first('agreement') }}</span>
									@endif
								</label>
							</div>
						</div>
					</div>
					{{-- <div class="panel panel-default">
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
												@if(!empty($types))
													@foreach($types as $type)
														<option value="{{ $type->type }}"{{ ($convenience_data->eco_park_type == $type->type ? ' selected' : '') }}>{{ ($type->type == 'ter' ? 'Taman Eko-Rimba (TER)' : 'Hutan Taman Negeri (HTN)') }}</option>
													@endforeach
												@endif
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
												@if(!empty($ecoparks))
													@foreach($ecoparks as $ecopark)
														<option value="{{ $ecopark->id }}"{{ ($ecopark->id == $convenience_data->eco_park_id ? ' selected' : '') }}>{{ $ecopark->name }}</option>
													@endforeach
												@endif
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
												@if(!empty($categories))
													@foreach($categories as $category)
														<option value="{{ $category->convenience_category->id }}"{{ ($category->convenience_category->id == $convenience_data->convenience_category_id ? ' selected' : '') }}>{{ $category->convenience_category->name }}</option>
													@endforeach
												@endif
												{{-- <option></option>
												@foreach($convenience_categories as $category)
													<option value="{{ $category->id }}"{{ ($category->id == $convenience_data->convenience_category_id ? ' selected' : '') }}>{{ $category->name }}</option>
												@endforeach --}}
											{{-- </select>
											@if($errors->has('convenience_category'))
												<span class="help-error">{{ $errors->first('convenience_category') }}</span>
											@endif
										</div>
										@php
											$display_people = 'none';
											$display_unit = 'none';
											if(!empty($convenience_data))
											{
												if($convenience_data->convenience_category_id == '2' OR $convenience_data->convenience_category_id == '3')
												{
													$display_people = 'block';
												}
												else
												{
													$display_unit = 'block';
												}
											}
										@endphp
										<div id="peopledetail" style="display: {!! $display_people !!}">
											<label style="display: block; margin-top: 15px">Jumlah Peserta <small><i>Participants Total</i></small></label>
											@if(!empty($convenience_data))
												@foreach($convenience_data->applicant_convenience_people as $people)
													@if($people->person == 'children')
														@php($type = 'Kanak-kanak')
													@elseif($people->person == 'student')
														@php($type = 'Pelajar')
													@elseif($people->person == 'adult')
														@php($type = 'Dewasa')
													@endif
													<div class="form-group">
														<label class="control-label">{{ $type }}</label>
														<input type="number" class="form-control" value="{{ $people->capacity }}" id="{{ $people->person }}" name="{{ $people->person }}">
													</div>
												@endforeach
											@endif
										</div>
										<div id="unitdetail" style="display: {!! $display_unit !!}">
											<div class="form-group">
												<label class="control-label">Unit <small><i>Unit</i></small></label>
												<input type="number" class="form-control" value="{{ (!empty($convenience_data) ? ($convenience_data->convenience_category_id != '2' OR $convenience_data->convenience_category_id != '3' ? $convenience_data->participant : '') : '') }}" id="unit" name="unit">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div id="unitdata" style="display: {!! $display_unit !!}">
											<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
												<label class="control-label">Kategori <small><i>Category</i></small></label>
												<select class="form-control select2" name="category" id="category" data-placeholder="Pilih Kategori" style="width: 100%">
													<option></option>

													@if(!empty($convenience_data))
														@if(($convenience_data->convenience_category_id == '2') OR ($convenience_data->convenience_category_id == '3'))
														@else
															@foreach($subcategories as $sub)
																<option value="{{ $sub->convenience_sub_category->id }}"{{ ($sub->convenience_sub_category->id == $convenience_data->applicant_convenience_unit->convenience_sub_category_id ? ' selected' : '') }}>{{ $sub->convenience_sub_category->name }}</option>
															@endforeach
														@endif
													@endif
												</select>
												@if($errors->has('category'))
													<span class="help-error">{{ $errors->first('category') }}</span>
												@endif
											</div>
										</div>
										<div id="people" style="display: {!! $display_people !!}">
											<div class="form-group{{ ($errors->has('nationality') ? ' has-error' : '') }}">
												<label class="control-label">Warganegara <small><i>Citizen</i></small></label>
												<select class="form-control select2" name="nationality" id="nationality" data-placeholder="Pilih Warganegara" style="width: 100%">
													<option></option>
													<option value="1"{{ (!empty($convenience_data) ? $convenience_data->nationality == '1' ? ' selected' : '' : '') }}>Warganegara</option>
													<option value="0"{{ (!empty($convenience_data) ? $convenience_data->nationality == '0' ? ' selected' : '' : '') }}>Bukan Warganegara</option>
												</select>
												@if($errors->has('nationality'))
													<span class="help-error">{{ $errors->first('nationality') }}</span>
												@endif
											</div>
										</div>
										<div id="pricing" style="display: block">
											<div class="form-group">
												<label class="control-label">Jumlah Harga <small><i>Total Price</i></small></label>
												<input type="hidden" id="price_convenience" value="{{ (!empty($convenience_data) ? $convenience_data->convenience->price : '') }}">
												<input type="text" class="form-control" value="{{ (!empty($convenience_data) ? $convenience_data->amount : '') }}" id="amount_convenience" name="amount_convenience" readonly>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}} 
				</div>
				<button type="submit" id="setApplication" class="btn btn-primary pull-right">Kemaskini / <i>Update</i><div class="ripple-container"></div></button>
				<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('partials.script.applicant')
@endsection

@if(session()->has('status'))
	@if(session()->get('status') == 'success')
		@section('modal')
			@include('account.partials.modal.application')
		@endsection
	@endif
@endif