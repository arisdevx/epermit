@extends('account.layouts.backend.panel')

@section('content')
	
	@if(session()->has('status'))
		@if(session()->get('status') == 'failed')
			<div class="alert alert-danger">Gagal menempah kemudahan.</div>
		@elseif(session()->get('status') != 'failed' && session()->get('status') != 'failed-capacity')
			<div class="alert alert-success">Anda telah berjaya menempah kemudahan.</div>
		@endif
	@endif

	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Borang Permohonan Tempahan Kemudahan TER/HTN / <i>Facility Reservations Application Form</i></h4>
			<p class="category">Tempahan Kemudahan TER/HTN / <i>Booking facilities</i></p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('account/member-tempahan-kemudahan/save')]) }}
			<input type="hidden" name="convenience_ids" id="convenience_ids">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading soft-green" role="tab">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#form1" aria-expanded="true" aria-controls="collapseOne">
								A. MAKLUMAT PERMOHONAN / APPLICATION INFORMATION
							</a>
						</h4>
					</div>
					<div id="form1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
										<label class="control-label">Negeri <small><i>State</i></small></label>
										<select class="selectpicker" name="state" id="state" data-live-search="true" data-dropup-auto="false">
											<option disabled selected value>Pilih Negeri</option>
											@foreach($states as $state)
												<option data-tokens="{{ $state->name }}" value="{{ $state->id }}"{{ (request()->old('state') == $state->id ? ' selected' : '') }}>{{ $state->name }}</option>
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
										<select class="selectpicker" name="area" id="area" data-live-search="true" data-dropup-auto="false" title="Daerah">
											<option disabled selected value>Daerah</option>
											@if(!$areas->isEmpty())
												@foreach($areas as $area)
													<option value="{{ $area->id }}"{{ (request()->old('area') == $area->id ? ' selected' : '') }}>{{ $area->name }}</option>
												@endforeach
											@endif
										</select>
										@if($errors->has('area'))
											<span class="help-error">{{ $errors->first('area') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('type') ? ' has-error' : '') }}">
										<label class="control-label">TER/HTN <small><i>TER/HTN</i></small></label>
										<select class="selectpicker" name="type" id="type" data-live-search="true" data-dropup-auto="false" title="TER/HTN">
											<option disabled selected value>Pilih TER/HTN </option>
											@if(request()->old('area'))
												<option value="ter"{{ (request()->old('type') == 'ter' ? ' selected' : '') }}>Taman Eko-Rimba (TER)</option>
												<option value="htn"{{ (request()->old('type') == 'htn' ? ' selected' : '') }}>Hutan Taman Negeri (HTN)</option>
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
										<select class="selectpicker" name="eco_park" id="eco_park" data-live-search="true" data-dropup-auto="false" title="Nama TER/HTN">
											<option disabled selected value>Nama TER/HTN</option>
											@if(!$ecoparks->isEmpty())
												@foreach($ecoparks as $ecopark)
													<option value="{{ $ecopark->id }}"{{ (request()->old('eco_park') == $ecopark->id ? ' selected' : '') }}>{{ $ecopark->name }}</option>
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
								<div class="col-md-5">
									<div class="form-group{{ ($errors->has('starting_date') ? ' has-error' : '') }}">
										<label class="control-label">Tarikh Mula <small><i>Start Date</i></small></label>
										<input type="text" class="form-control otherStartingDate" value="{{ request()->old('starting_date') }}" id="starting_date" name="starting_date">
									</div>
									<small>* Bermula 02:00PM / * Start time 02:00PM</small>
									@if($errors->has('starting_date'))
										<br><span class="help-error" style="color: red">{{ $errors->first('starting_date') }}</span>
									@endif
								</div>
								<div class="col-md-5">
									<div class="form-group{{ ($errors->has('ending_date') ? ' has-error' : '') }}">
										<label class="control-label">Tarikh Akhir <small><i>End Date</i></small></label>
										<input type="text" class="form-control otherEndingDate" value="{{ request()->old('ending_date') }}" id="ending_date" name="ending_date">
									</div>
									<small>* Selewat-lewatnya 12:00PM / * At the latest 12:00PM</small>
									@if($errors->has('ending_date'))
										<br><span class="help-error" style="color: red">{{ $errors->first('ending_date') }}</span>
									@endif
								</div>
								<div class="col-md-2">
									<div class="form-group{{ ($errors->has('day') ? ' has-error' : '') }}">
										<label class="control-label">Bil. Hari <small><i>Number of Days</i></small></label>
										<input type="number" class="form-control" id="day" name="day" value="{{ request()->old('day') }}" min="0">
										@if($errors->has('day'))
											<span class="help-error">{{ $errors->first('day') }}</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('convenience_category') ? ' has-error' : '') }}">
										<label class="control-label">Jenis Kemudahan <small><i>Convenience Type</i></small></label>
										<select class="selectpicker" name="convenience_category" id="convenience_category" data-live-search="true" data-dropup-auto="false" title="Jenis Kemudahan">
											<option disabled selected value>Pilih Jenis Kemudahan</option>
											@if(!$conveniences->isEmpty())
												@foreach($conveniences as $convenience)
													<option value="{{ $convenience->convenience_category->id }}">{{ $convenience->convenience_category->name }}</option>
												@endforeach
											@endif
											{{-- @foreach($convenience_categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach --}}
										</select>
										@if($errors->has('convenience_category'))
											<span class="help-error">{{ $errors->first('convenience_category') }}</span>
										@endif
									</div>
									<div id="peopledetail" style="display: none">
										<label style="display: block; margin-top: 15px">Jumlah Peserta <small><i>Number of Participants</i></small></label>
										<div class="form-group">
											<label class="control-label">Kanak-kanak <small><i>Childrens</i></small></label>
											<select class="selectpicker" name="children" id="children" title="Kanak-kanak" data-live-search="true" data-dropup-auto="false" style="width: 100%">
												<option disabled selected value>Kanak-kanak</option>
											</select>
											{{-- <input type="number" class="form-control" value="" id="children" name="children"> --}}
										</div>
										<div class="form-group">
											<label class="control-label">Pelajar <small><i>Student</i></small></label>
											<select class="selectpicker" name="student" id="student" title="Pelajar" data-live-search="true" data-dropup-auto="false" style="width: 100%">
												<option disabled selected value>Pelajar</option>
											</select>
											{{-- <input type="number" class="form-control" value="" id="student" name="student"> --}}
										</div>
										<div class="form-group">
											<label class="control-label">Dewasa <small><i>Adult</i></small></label>
											<select class="selectpicker" name="adult" id="adult" title="Dewasa" data-live-search="true" data-dropup-auto="false" style="width: 100%">
												<option disabled selected value>Dewasa</option>
											</select>
											{{-- <input type="number" class="form-control" value="" id="adult" name="adult"> --}}
										</div>
									</div>
									<div id="unitdetail" style="display: none">
										<div class="form-group">
											<label class="control-label">Unit <small><i>Unit</i></small></label>
											<select class="selectpicker" name="unit" id="unit" title="Unit" data-live-search="true" data-dropup-auto="false" style="width: 100%">
												<option></option>
											</select>
											{{-- <input type="number" class="form-control" value="" id="unit" name="unit"> --}}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="unitdata" style="display: none">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="selectpicker" name="category" id="category" title="Kategori" data-live-search="true" data-dropup-auto="false" style="width: 100%">
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
											<select class="selectpicker" name="nationality" id="nationality" title="Warganegara" data-live-search="true" data-dropup-auto="false" style="width: 100%">
												<option disabled selected value>Warganegara/Bukan Warganegara</option>
												<option value="1">Warganegara <small><i>Citizen</i></small></option>
												<option value="0">Bukan Warganegara <small><i>Non-Citizen</i></small></option>
											</select>
											@if($errors->has('nationality'))
												<span class="help-error">{{ $errors->first('nationality') }}</span>
											@endif
										</div>
									</div>
									<div id="pricing" style="display: none">
										<div class="form-group{{ ($errors->has('amount') ? ' has-error' : '') }}">
											<label class="control-label">Jumlah Harga <small><i>Total Price</i></small></label>
											<input type="hidden" id="price">
											<input type="text" class="form-control" value="" id="amount" name="amount" readonly>
											@if($errors->has('amount'))
												<span class="help-error">{{ $errors->first('amount') }}</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							{{-- <div class="row">
								<div class="col-md-6">
									<label style="display: block">Jumlah Peserta</label>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Kanak-kanak</label>
												<input type="text" class="form-control" value="" id="children" name="children">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Pelajar</label>
												<input type="text" class="form-control" value="" id="student" name="student">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Dewasa</label>
												<input type="text" class="form-control" value="" id="adult" name="adult">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Jumlah Harga</label>
										<input type="hidden" id="price">
										<input type="text" class="form-control" value="" id="amount" name="amount">
									</div>
								</div>
							</div> --}}

							<div style="margin: 40px 0;">
								<a href="#" id="addToTable" class="btn btn-primary pull-right">Tambah / Add</a>
								<div class="clearfix"></div>
								<table class="table table-bordered" border="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Tarikh Mula<br /><i>Start Date</i></th>
											<th>Tarikh Akhir<br><i>End Date</i></th>
											<th>Bil. Hari<br /><i>Total of Days</i></th>
											<th>Jenis Kemudahan<br /><i>Type of Convenience</i></th>
											<th>Kategori<br /><i>Category</i></th>
											<th>Unit<br /><i>Unit</i></th>
											<th>Harga<br /><i>Price</i></th>
											<th class="text-center">Tindakan<br /><i>Action</i></th>
										</tr>
									</thead>
									<tbody id="convenienceTableData">
										<tr id="convenienceEmpty">
											<td colspan="9" align="center">Tiada maklumat / No information</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading soft-green" role="tab">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#form2" aria-expanded="false" aria-controls="form2">
								B. PENGESAHAN PERMOHONAN / CONFIRMATION OF APPLICATION
							</a>
						</h4>
					</div>
					<div id="form2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							{{-- <p><b>Pengakuan Pemohon</p>
							<p>Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan Pemohon & Peserta semasa menjalankan aktiviti adalah tanggungjawab sendiri.</p>
							<p><i>I acknowledge that the information provided above is true. The government will not be held responsible if there are any difficulties that arise from incorrect information. The safety of hiker while conducting activities the responsibility of its own</i></p> --}}
						
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
								<strong><input type="checkbox" name="agreement">&nbsp;Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar. <br><i style="margin-left: 17px">I acknowledge that all information given and presented in this system is true.</i></strong>
								@if($errors->has('agreement'))
									<span class="help-error" style="display: block; color: red">{{ $errors->first('agreement') }}</span>
								@endif
							</label>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<button type="submit" id="setApplication" class="btn btn-primary pull-right">Mohon / Request<div class="ripple-container"></div></button>
			<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('account.partials.script.convenience')
@endsection

@if(session()->has('status'))
	@if(session()->get('status') == 'failed-capacity')
		@section('modal')
			@include('account.partials.modal.convenience')
		@endsection
	@endif
@endif
