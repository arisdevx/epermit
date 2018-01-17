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
			<h4 class="title">Tempahan Kemudahan TER/HTN</h4>
			<p class="category">Borang permohonan Tempahan Kemudahan TER/HTN</p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => route('member-tempahan-kemudahan.update', request()->segment(3)), 'method' => 'PUT']) }}
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
												<option value="{{ $state->id }}"{{ ($state->id == $convenience_data->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
											@foreach($areas as $area)
												<option value="{{ $area->id }}"{{ ($area->id == $convenience_data->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
											@endforeach
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
										<select class="form-control select2" name="type" id="type" data-placeholder="Pilih TER/HTN">
											@foreach($types as $type)
											<option value="{{ $type->type }}"{{ ($convenience_data->eco_park_type == $type->type ? ' selected' : '') }}>{{ ($type->type == 'ter' ? 'Taman Eko-Rimba (TER)' : 'Hutan Taman Negeri (HTN)') }}</option>
											@endforeach
											{{-- <option></option> --}}
											{{-- <option value="ter"{{ ($convenience_data->eco_park_type == 'ter' ? ' selected' : '') }}>Taman Eko-Rimba (TER)</option>
											<option value="htn"{{ ($convenience_data->eco_park_type == 'htn' ? ' selected' : '') }}>Hutan Taman Negeri (HTN)</option> --}}
										</select>
										@if($errors->has('type'))
											<span class="help-error">{{ $errors->first('type') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('eco_park') ? ' has-error' : '') }}">
										<label class="control-label">Nama TER/HTN <small><i>Name of TER/HTN</i></small></label>
										<select class="form-control select2" name="eco_park" id="eco_park" data-placeholder="Pilih Nama TER/HTN">
											<option></option>
											@foreach($ecoparks as $ecopark)
												<option value="{{ $ecopark->id }}"{{ ($ecopark->id == $convenience_data->eco_park_id ? ' selected' : '') }}>{{ $ecopark->name }}</option>
											@endforeach
										</select>
										@if($errors->has('eco_park'))
											<span class="help-error">{{ $errors->first('eco_park') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label">Tarikh Mula <small><i>Starting Date</i></small></label>
										<input type="text" class="form-control otherStartingDate" value="{{ date('d/m/Y', strtotime($convenience_data->starting_date)) }}" id="starting_date" name="starting_date">
									</div>
									<small>* Bermula 02:00PM</small>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label">Tarikh Akhir <small><i>Ending Date</i></small></label>
										<input type="text" class="form-control otherEndingDate" value="{{ date('d/m/Y', strtotime($convenience_data->ending_date)) }}" id="ending_date" name="ending_date">
									</div>
									<small>* Selewat-lewatnya 12:00PM</small>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Bil. Hari <small><i>Number of Days</i></small></label>
										<input type="text" class="form-control" id="day" name="day" value="{{ $convenience_data->days_total }}">
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('convenience_category') ? ' has-error' : '') }}">
										<label class="control-label">Jenis Kemudahan <small><i>Convenience Type</i></small></label>
										<select class="form-control select2" name="convenience_category" id="convenience_category" data-placeholder="Pilih Jenis Kemudahan">
											@foreach($categories as $category)
												<option value="{{ $category->convenience_category->id }}"{{ ($category->convenience_category->id == $convenience_data->convenience_category_id ? ' selected' : '') }}>{{ $category->convenience_category->name }}</option>
											@endforeach
											{{-- <option></option>
											@foreach($convenience_categories as $category)
												<option value="{{ $category->id }}"{{ ($category->id == $convenience_data->convenience_category_id ? ' selected' : '') }}>{{ $category->name }}</option>
											@endforeach --}}
										</select>
										@if($errors->has('convenience_category'))
											<span class="help-error">{{ $errors->first('convenience_category') }}</span>
										@endif
									</div>
									@php
										$display_people = 'none';
										$display_unit = 'none';

										if($convenience_data->convenience_category_id == '2' OR $convenience_data->convenience_category_id == '3')
										{
											$display_people = 'block';
										}
										else
										{
											$display_unit = 'block';
										}
									@endphp
									<div id="peopledetail" style="display: {!! $display_people !!}">
										<label style="display: block; margin-top: 15px">Jumlah Peserta <small><i>Number of Participants</i></small></label>
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
												<input type="number" class="form-control" value="{{ $people->capacity }}" id="{{ $people->person }}" name="{{ $people->person }}" readonly>
											</div>
										@endforeach
									</div>
									
									<div id="unitdetail" style="display: {!! $display_unit !!}">
										<div class="form-group">
											<label class="control-label">Unit <small><i>Unit</i></small></label>
											@php($participantUnit = ($convenience_data->convenience_category_id != '2' OR $convenience_data->convenience_category_id != '3' ? $convenience_data->participant : ''))
											
											@if($slots >= 0)
												<select class="form-control select2" name="unit" id="unit" data-placeholder="Jumlah Unit" style="width: 100%">
													@for($i = 1; $i < $slots; $i++)
														<option value="{{ $i }}"{{ ((int)$convenience_data->participant == $i ? ' selected' : 'x') }}>{{ $i }}</option>
													@endfor
												</select>
											@else
											@endif

											{{-- <input type="number" class="form-control" value="{{ ($convenience_data->convenience_category_id != '2' OR $convenience_data->convenience_category_id != '3' ? $convenience_data->participant : '') }}" id="unit" name="unit" readonly> --}}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="unitdata" style="display: {!! $display_unit !!}">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="form-control select2" name="category" id="category" data-placeholder="Pilih Kategori" style="width: 100%">
												<option></option>

												@if(($convenience_data->convenience_category_id == '2') OR ($convenience_data->convenience_category_id == '3'))
												@else
													@foreach($subcategories as $sub)
														<option value="{{ $sub->convenience_sub_category->id }}"{{ ($sub->convenience_sub_category->id == $convenience_data->applicant_convenience_unit->convenience_sub_category_id ? ' selected' : '') }}>{{ $sub->convenience_sub_category->name }}</option>
													@endforeach
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
												<option value="1"{{ $convenience_data->nationality == '1' ? ' selected' : '' }}>Warganegara</option>
												<option value="0"{{ $convenience_data->nationality == '0' ? ' selected' : '' }}>Bukan Warganegara</option>
											</select>
											@if($errors->has('nationality'))
												<span class="help-error">{{ $errors->first('nationality') }}</span>
											@endif
										</div>
									</div>
									<div id="pricing" style="display: block">
										<div class="form-group">
											<label class="control-label">Jumlah Harga <small><i>Total Price</i></small></label>
											<input type="hidden" id="price" value="{{ $convenience_data->convenience->price }}">
											<input type="text" class="form-control" value="{{ $convenience_data->amount }}" id="amount" name="amount" readonly>
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
								<input type="text" class="form-control" value="{{ (!empty($convenience_data->applicant_convenience_declaration->name) ? $convenience_data->applicant_convenience_declaration->name : '') }}" id="declaration_name" name="declaration_name" value="" readonly>
								@if($errors->has('declaration_name'))
									<span class="help-error">{{ $errors->first('declaration_name') }}</span>
								@endif
							</div>
							<div class="form-group{{ ($errors->has('declaration_ic') ? ' has-error' : '') }}">
								<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
								<input type="text" class="form-control" value="{{ (!empty($convenience_data->applicant_convenience_declaration->ic_number) ? $convenience_data->applicant_convenience_declaration->ic_number : '') }}" id="declaration_ic" name="declaration_ic" readonly>
								@if($errors->has('declaration_ic'))
									<span class="help-error">{{ $errors->first('declaration_ic') }}</span>
								@endif
							</div>
							<div class="form-group{{ ($errors->has('declaration_date') ? ' has-error' : '') }}">
								<label class="control-label">Tarikh <small><i>Date</i></small></label>
								<input type="text" class="form-control" value="{{ date('d/m/Y', strtotime((!empty($convenience_data->applicant_convenience_declaration->application_date) ? $convenience_data->applicant_convenience_declaration->application_date : date('Y-m-d H:i:s')))) }}" name="declaration_date" readonly>
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
			<hr />
			<button type="submit" id="setApplication" class="btn btn-primary pull-right">Kemaskini<div class="ripple-container"></div></button>
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