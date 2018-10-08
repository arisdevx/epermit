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
			<h4 class="title">Borang Permohonan Lain-lain Aktiviti / <i>Application Form of Others Activities</i></h4>
			<p class="category">Lain-lain Aktiviti / <i>Others Activities</i></p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => route('member-aktiviti-lain.store'), 'files' => true]) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
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
											<select class="selectpicker" name="state" id="state" title="Negeri" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Negeri</option>
												@foreach($states as $state)
													<option value="{{ $state->id }}" {{ (request()->old('state') == $state->id ? 'selected' : '') }}>{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('state'))
												<span class="help-error">{!! $errors->first('state') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('area') ? ' has-error' : '') }}">
											<label class="control-label">Daerah <small><i>Area</i></small></label>
											<select class="selectpicker" name="area" id="area" title="Daerah" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Daerah</option>
												@if(!$areas->isEmpty())
													@foreach($areas as $area)
														<option value="{{ $area->id }}" {{ (request()->old('area') == $area->id ? 'selected' : '') }}>{{ $area->name }}</option>
													@endforeach
												@endif
											</select>
											@if($errors->has('area'))
												<span class="help-error">{!! $errors->first('area') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="selectpicker" name="category" id="category" title="Kategori" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Kategori</option>
												<option value="ter" {{ (request()->old('category') == 'ter' ? 'selected' : '') }}>Taman Eko-Rimba (TER)</option>
												<option value="htn" {{ (request()->old('category') == 'htn' ? 'selected' : '') }}>Hutan Taman Negeri (HTN)</option>
												<option value="hsk" {{ (request()->old('category') == 'hsk' ? 'selected' : '') }}>Hutan Simpan Kekal (HSK)</option>
											</select>
											@if($errors->has('category'))
												<span class="help-error">{!! $errors->first('category') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('place') ? ' has-error' : '') }}">
											<label class="control-label">Tempat Aktiviti <small><i>Place of Activity</i></small></label>
											<select class="selectpicker" name="place" id="place" title="Tempat Aktiviti" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Tempat Aktiviti</option>
												@if(!$places->isEmpty())
													@foreach($places as $place)
														<option value="{{ $place->id }}" {{ (request()->old('place') == $place->id ? 'selected' : '') }}>{{ $place->name }}</option>
													@endforeach
												@endif
											</select>
											@if($errors->has('place'))
												<span class="help-error">{!! $errors->first('place') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('location') ? ' has-error' : '') }}">
											<label class="control-label">Nyatakan Lokasi <small><i>Specify Location</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('location') }}" name="location" id="location" disabled>
											@if($errors->has('location'))
												<span class="help-error">{!! $errors->first('location') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('starting_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Mula Program <small><i>Starting Date of Program</i></small></label>
											<input type="text" class="form-control otherStartingDate" name="starting_date" id="starting_date" value="{{ request()->old('starting_date') }}">
											@if($errors->has('starting_date'))
												<span class="help-error">{!! $errors->first('starting_date') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('ending_date') ? ' has-error' : '') }}">
											<label class="control-label">Tarikh Akhir Program <small><i>Ending Date of Program</i></small></label>
											<input type="text" class="form-control otherEndingDate" name="ending_date" id="ending_date" value="{{ request()->old('ending_date') }}">
											@if($errors->has('ending_date'))
												<span class="help-error">{!! $errors->first('ending_date') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('participant') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Peserta <small><i>Number of Participants</i></small></label>
											{{-- <select class="selectpicker" name="participant" id="participant" data-placeholder="Bilangan Peserta">
												<option></option>
											</select> --}}
											<input type="number" class="form-control" value="{{ request()->old('participant') }}" name="participant" id="participant" min="0">
											@if($errors->has('participant'))
												<span class="help-error">{!! $errors->first('participant') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
											<label class="control-label">Bilangan Hari <small><i>Number of Days</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('day') }}" name="day" id="day" readonly>
											@if($errors->has('day'))
												<span class="help-error">{!! $errors->first('day') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group{{ ($errors->has('amount') ? ' has-error' : '') }}">
											<label class="control-label">Harga <small><i>Price</i></small></label>
											<input type="hidden" name="price" id="price">
											<input type="text" class="form-control" value="{{ (!empty(request()->old('amount')) ? request()->old('amount') : '0') }}" name="amount" id="amount" readonly>
											@if($errors->has('amount'))
												<span class="help-error">{!! $errors->first('amount') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('name') ? ' has-error' : '') }}">
											<label class="control-label">Nama Aktiviti <small><i>Activity Name</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('name') }}" name="name" id="name" placeholder="eg : Kem Bina Negara, Kem Jambori Pengakap">
											@if($errors->has('name'))
												<span class="help-error">{!! $errors->first('name') !!}</span>
											@endif
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('agency') ? ' has-error' : '') }}">
											<label class="control-label">Nama Agensi/Persatuan/Individu <small><i>Name of Agency / Associate / Individual</i></small></label>
											<input type="text" class="form-control" name="agency" value="{{ request()->old('agency') }}">
											@if($errors->has('agency'))
												<span class="help-error">{!! $errors->first('agency') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('phone') ? ' has-error' : '') }}">
											<label class="control-label">No Telefon <small><i>Phone Number</i></small></label>
											<input type="number" class="form-control" value="{{ request()->old('phone') }}" name="phone" id="phone" min="0" data-maxsize="15">
											@if($errors->has('phone'))
											<span class="help-error">{!! $errors->first('phone') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('email') ? ' has-error' : '') }}">
											<label class="control-label">Email <small><i>Email</i></small></label>
											<input type="email" class="form-control" value="{{ request()->old('email') }}" name="email" id="email">
											@if($errors->has('email'))
											<span class="help-error">{!! $errors->first('email') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('fax') ? ' has-error' : '') }}">
											<label class="control-label">No Faks <small><i>Fax</i></small></label>
											<input type="number" class="form-control" value="{{ request()->old('fax') }}" name="fax" id="fax" min="0" data-maxsize="15">
											@if($errors->has('fax'))
											<span class="help-error">{!! $errors->first('fax') !!}</span>
											@endif
										</div>
									</div>
								</div>
								
								<hr />
								<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}">
									<label class="control-label">Alamat <small><i>Address</i></small></label>
									<input type="text" class="form-control" value="{{ request()->old('address') }}" name="address">
									@if($errors->has('address'))
										<span class="help-error">{!! $errors->first('address') !!}</span>
									@endif
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
											<label class="control-label">Bandar <small><i>City</i></small></label>
											<input type="text" class="form-control" value="{{ request()->old('city') }}" name="city" id="city">
											@if($errors->has('city'))
												<span class="help-error">{!! $errors->first('city') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div style="margin-top: 0 !important" class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
											<label class="control-label">Poskod <small><i>Postcode</i></small></label>
											<input type="number" class="form-control" value="{{ request()->old('postcode') }}" name="postcode" id="postcode" data-maxsize="5" min="0">
											@if($errors->has('postcode'))
												<span class="help-error">{!! $errors->first('postcode') !!}</span>
											@endif
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('state_secondary') ? ' has-error' : '') }}">
											<label class="control-label">Negeri <small><i>State</i></small></label>
											<select class="selectpicker" title="Negeri" name="state_secondary" id="state_secondary" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Negeri</option>
												@foreach($states as $state)
													<option value="{{ $state->id }}"{{ (request()->old('state_secondary') == $state->id ? ' selected' : '') }}>{{ $state->name }}</option>
												@endforeach
											</select>
											@if($errors->has('state_secondary'))
												<span class="help-error">{!! $errors->first('state_secondary') !!}</span>
											@endif
										</div>
										
									</div>
									<div class="col-md-3">
										<div class="form-group{{ ($errors->has('country') ? ' has-error' : '') }}">
											<label class="control-label">Negara <small><i>Country</i></small></label>
											<select class="selectpicker" title="Negara" name="country" id="country" data-live-search="true" data-dropup-auto="false">
												<option disabled selected value>Negara</option>
												@foreach($countries as $country)
													<option value="{{ $country->id }}"{{ (strtolower($country->name) == 'malaysia' ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
												@endforeach
											</select>
											@if($errors->has('country'))
												<span class="help-error">{!! $errors->first('country') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group{{ ($errors->has('description') ? ' has-error' : '') }}">
											<label class="control-label">Keterangan Aktiviti <small><i>Acitivity Description</i></small></label>
											<textarea class="form-control" rows="5" name="description">{{ request()->old('description') }}</textarea>
											@if($errors->has('description'))
												<span class="help-error">{!! $errors->first('description') !!}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label style="display: block">Muat Naik Senarai Peserta <span style="color: red;">(*)</span> <small><i>Upload list of participants <span style="color: red;">(*)</span></i></small></label>
										<div class="fileUpload btn btn-default">
											<span>Pilih File / Choose File</span>
											<input type="file" name="participant_file" data-id="1" class="uploadBtn upload" />
										</div>
										<input id="uploadFakePath-1" class="form-control" placeholder="Lokasi fail / Location file" disabled="disabled" />
										@if($errors->has('participant_file'))
											<span class="help-error" style="color: red">{!! $errors->first('participant_file') !!}</span>
										@endif
									</div>
									<div class="col-md-6">
										<label style="display: block">Muat Naik Atur Cara Program <span style="color: red;">(*)</span> <small><i>Upload program guide <span style="color: red;">(*)</span></i></small></label>
										<div class="fileUpload btn btn-default">
											<span>Pilih File / Choose File</span>
											<input type="file" name="program_file" data-id="2" class="uploadBtn upload" />
										</div>
										<input id="uploadFakePath-2" class="form-control" placeholder="Lokasi fail / Location file" disabled="disabled" />
										@if($errors->has('program_file'))
											<span class="help-error" style="color: red">{!! $errors->first('program_file') !!}</span>
										@endif
									</div>
								</div>
								<p>Jika pihak tuan/puan berminat untuk membuat tempahan kemudahn di TER/HTN, sila ke modul Tempahan Kemudahan di lama utama</p>
								<p><i>If you are interested in booking a facility at TER / HTN, please go to Tempahan Kemudahan module at main page</i></p>

							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading soft-green" role="tab">
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
										<span class="help-error">{!! $errors->first('declaration_name') !!}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('declaration_ic') ? ' has-error' : '') }}">
									<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
									<input type="text" class="form-control" value="{{ (auth()->guard('applicant')->user()->profile->citizen == '1' ? auth()->guard('applicant')->user()->profile->nokp : auth()->guard('applicant')->user()->profile->passport) }}" id="declaration_ic" name="declaration_ic" readonly>
									@if($errors->has('declaration_ic'))
										<span class="help-error">{!! $errors->first('declaration_ic') !!}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('declaration_date') ? ' has-error' : '') }}">
									<label class="control-label">Tarikh <small><i>Date</i></small></label>
									<input type="text" class="form-control" value="{{ date('d/m/Y') }}" name="declaration_date" readonly>
									@if($errors->has('declaration_date'))
										<span class="help-error">{!! $errors->first('declaration_date') !!}</span>
									@endif
								</div>

								<p><b>Nota: Permohonan perlu dikemukakan tujuh (7) hari waktu bekerja sebelum tarikh pendakian dilakukan kepada Jabatan Perhutanan Negeri.</b></p>
								<p><i>Notes: Application must be submitted seven (7) days working hour before the date of hiking activities to the State Forestry Department.</i></p>
								<label>
									<strong><input type="checkbox" name="agreement">&nbsp;Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar. <br><i style="margin-left: 17px">I acknowledge that all information given and presented in this system is true.</i></strong>
									@if($errors->has('agreement'))
										<span class="help-error" style="display: block; color: red">{!! $errors->first('agreement') !!}</span>
									@endif
								</label>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Mohon / <i>Apply</i></button>
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