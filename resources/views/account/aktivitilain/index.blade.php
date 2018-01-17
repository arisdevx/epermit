@extends('account.layouts.backend.panel')

@section('content')
	@if(session()->has('status'))
		@if(session()->get('status') == 'failed')
			<div class="alert alert-danger">Gagal</div>
		@else
			<div class="alert alert-success">Success</div>
		@endif
	@endif
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Lain-lain Aktiviti</h4>
			<p class="category">Borang permohonan Lain-lain Aktiviti</p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => route('member-aktiviti-lain.store'), 'files' => true]) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#form1" aria-expanded="true" aria-controls="collapseOne">
									A. MAKLUMAT PERMOHONAN
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
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="form-control select2" name="category" id="category" data-placeholder="Pilih Kategori">
												<option></option>
												<option value="ter">Taman Eko-Rimba (TER)</option>
												<option value="htn">Hutan Taman Negeri (HTN)</option>
												<option value="hsk">Hutan Simpan Kekal (HSK)</option>
											</select>
											@if($errors->has('category'))
												<span class="help-error">{{ $errors->first('category') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('place') ? ' has-error' : '') }}">
											<label class="control-label">Tempat Aktiviti <small><i>Place of Activity</i></small></label>
											<select class="form-control select2" name="place" id="place" data-placeholder="Pilih Tempat Aktiviti">
												<option></option>
											</select>
											@if($errors->has('place'))
												<span class="help-error">{{ $errors->first('place') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('location') ? ' has-error' : '') }}">
											<label class="control-label">Nyatakan Lokasi <small><i>Specify Location</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('location') }}" name="location" id="location" disabled>
											@if($errors->has('location'))
												<span class="help-error">{{ $errors->first('location') }}</span>
											@endif
										</div>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('starting_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Mula <small><i>Starting Date</i></small></label>
											<input type="text" class="form-control otherStartingDate" name="starting_date" id="starting_date" value="{{ request()->old('starting_date') }}">
											@if($errors->has('starting_date'))
												<span class="help-error">{{ $errors->first('starting_date') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('ending_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Akhir <small><i>Ending Date</i></small></label>
											<input type="text" class="form-control otherEndingDate" name="ending_date" id="ending_date" value="{{ request()->old('ending_date') }}">
											@if($errors->has('ending_date'))
												<span class="help-error">{{ $errors->first('ending_date') }}</span>
											@endif
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-5">
										<div class="form-group{{ ($errors->has('participant') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Peserta <small><i>Number of Participants</i></small></label>
											{{-- <select class="form-control select2" name="participant" id="participant" data-placeholder="Bilangan Peserta">
												<option></option>
											</select> --}}
											<input type="text" class="form-control" value="{{ request()->old('participant') }}" name="participant" id="participant">
											@if($errors->has('participant'))
												<span class="help-error">{{ $errors->first('participant') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Hari <small><i>Number of Days</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('day') }}" name="day" id="day" readonly>
											@if($errors->has('day'))
												<span class="help-error">{{ $errors->first('day') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group{{ ($errors->has('amount') ? ' has-error' : '') }}">
											<label class="control-label">Harga <small><i>Price</i></small></label>
											<input type="hidden" name="price" id="price">
											<input type="text" class="form-control" value="{{ (!empty(request()->old('amount')) ? request()->old('amount') : '0') }}" name="amount" id="amount" readonly>
											@if($errors->has('amount'))
												<span class="help-error">{{ $errors->first('amount') }}</span>
											@endif
										</div>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('name') ? ' has-error' : '') }}">
											<label class="control-label">Nama Aktiviti <small><i>Activity Name</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('name') }}" name="name" id="name">
											@if($errors->has('name'))
												<span class="help-error">{{ $errors->first('name') }}</span>
											@endif
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('agency') ? ' has-error' : '') }}">
											<label class="control-label">Nama Agensi/Persatuan/Individu <small><i>Name of Agency / Associate / Individual</i></small></label>
											<input type="text" class="form-control" name="agency">
											@if($errors->has('agency'))
												<span class="help-error">{{ $errors->first('agency') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('phone') ? ' has-error' : '') }}">
											<label class="control-label">No Telefon <small><i>Phone Number</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('phone') }}" name="phone" id="phone">
											@if($errors->has('phone'))
											<span class="help-error">{{ $errors->first('phone') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('email') ? ' has-error' : '') }}">
											<label class="control-label">Email <small><i>Email</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('email') }}" name="email" id="email">
											@if($errors->has('email'))
											<span class="help-error">{{ $errors->first('email') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('fax') ? ' has-error' : '') }}">
											<label class="control-label">No Faks <small><i>Fax</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('fax') }}" name="fax" id="fax">
											@if($errors->has('fax'))
											<span class="help-error">{{ $errors->first('fax') }}</span>
											@endif
										</div>
									</div>
								</div>
								
								<hr />
								<div class="row">
									<div class="col-md-7">
										<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}">
											<label class="control-label">Alamat <small><i>Address</i></small></label>
											<textarea class="form-control" rows="6" name="address"></textarea>
											@if($errors->has('address'))
												<span class="help-error">{{ $errors->first('address') }}</span>
											@endif
										</div>
										<div style="margin-top: 0 !important" class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
											<label class="control-label" style="margin-top: 0 !important;">Poskod <small><i>Postcode</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('postcode') }}" name="postcode" id="postcode">
											@if($errors->has('postcode'))
												<span class="help-error">{{ $errors->first('postcode') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
											<label class="control-label">Bandar <small><i>City</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('city') }}" name="city" id="city">
											@if($errors->has('city'))
												<span class="help-error">{{ $errors->first('city') }}</span>
											@endif
										</div>
										<div class="form-group{{ ($errors->has('state_secondary') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="form-control select2" name="state_secondary" id="state_secondary" data-placeholder="Pilih Negeri">
												<option></option>
												@foreach($states as $state)
													<option value="{{ $state->id }}">{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('state_secondary'))
												<span class="help-error">{{ $errors->first('state_secondary') }}</span>
											@endif
										</div>
										<div class="form-group{{ ($errors->has('country') ? ' has-error' : '') }}">
											<label class="control-label">Negara <small><i>Country</i></small></label>
											<select class="form-control select2" name="country" id="country" data-placeholder="Pilih Negara">
												<option></option>
												@foreach($countries as $country)
													<option value="{{ $country->id }}"{{ (strtolower($country->name) == 'malaysia' ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
												@endforeach
											</select>
											@if($errors->has('country'))
												<span class="help-error">{{ $errors->first('country') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group{{ ($errors->has('description') ? ' has-error' : '') }}">
											<label class="control-label">Keterangan Aktiviti <small><i>Acitivity Description</i></small></label>
											<textarea class="form-control" rows="5" name="description"></textarea>
											@if($errors->has('description'))
												<span class="help-error">{{ $errors->first('description') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label style="display: block">Muat Naik Senarai Peserta <small><i>Upload list of participants</i></small></label>
										<div class="fileUpload btn btn-default">
											<span>Pilih File</span>
											<input type="file" name="participant_file" data-id="1" class="uploadBtn upload" />
										</div>
										<input id="uploadFakePath-1" class="form-control" placeholder="Lokasi fail" disabled="disabled" />
										@if($errors->has('participant_file'))
											<span class="help-error" style="color: red">{{ $errors->first('participant_file') }}</span>
										@endif
									</div>
									<div class="col-md-6">
										<label style="display: block">Muat Naik Atur Cara Program <small><i>Upload program guide</i></small></label>
										<div class="fileUpload btn btn-default">
											<span>Pilih File</span>
											<input type="file" name="program_file" data-id="2" class="uploadBtn upload" />
										</div>
										<input id="uploadFakePath-2" class="form-control" placeholder="Lokasi fail" disabled="disabled" />
										@if($errors->has('program_file'))
											<span class="help-error" style="color: red">{{ $errors->first('program_file') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form2" aria-expanded="false" aria-controls="form2">
									B. PENGESAHAN PERMOHONAN
								</a>
							</h4>
						</div>
						<div id="form2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<p><b>Pengakuan Pemohon</p>
								<p>Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan Pemohon & Peserta semasa menjalankan aktiviti adalah tanggungjawab sendiri.</p>
								<p><i>I acknowledge that the information provided above is true. The government will not be held responsible if there are any difficulties that arise from incorrect information. The safety of hiker while conducting activities the responsibility of its own</i></p>
							
								<div class="form-group{{ ($errors->has('declaration_name') ? ' has-error' : '') }}">
									<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
									<input type="text" class="form-control" value="{{ auth()->guard('applicant')->user()->name }}" id="declaration_name" name="declaration_name" value="" readonly>
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

								<p><b>Nota: Permohonan perlu dikemukakan tujuh (7) hari waktu bekerja sebelum tarikh pendakian dilakukan kepada Jabatan Perhutanan Negeri.</b></p>
								<p><i>Notes: Application must be submitted seven (7) days working hour before the date of hiking activities to the State Forestry Department.</i></p>
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
				<button type="submit" class="btn btn-primary">Mohon</button>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('account.partials.script.othersactivity')
@endsection
@section('modal')
	@include('account.partials.modal.application')
@endsection