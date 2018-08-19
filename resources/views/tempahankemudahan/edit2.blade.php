@extends('layouts.panel')

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
			{{ Form::open(['url' => url('tempahan-kemudahan/update2/' . request()->segment(3))]) }}
			
			
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
										<select class="form-control selectpicker" name="state" id="state" data-live-search="true">
						
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
										<select class="form-control selectpicker" name="area" id="area" data-live-search="true">
						
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
										<select class="form-control selectpicker" name="type" id="type" data-live-search="true">
											@foreach($types as $type)
											<option value="{{ $type->type }}"{{ ($convenience_data->eco_park_type == $type->type ? ' selected' : '') }}>{{ ($type->type == 'ter' ? 'Taman Eko-Rimba (TER)' : 'Hutan Taman Negeri (HTN)') }}</option>
											@endforeach
										</select>
										@if($errors->has('type'))
											<span class="help-error">{{ $errors->first('type') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('eco_park') ? ' has-error' : '') }}">
										<label class="control-label">Nama TER/HTN <small><i>Name of TER/HTN</i></small></label>
										<select class="form-control selectpicker" name="eco_park" id="eco_park" data-live-search="true">
						
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
									<small>* Bermula 02:00PM / * Start time 02:00PM</small>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label">Tarikh Akhir <small><i>Ending Date</i></small></label>
										<input type="text" class="form-control otherEndingDate" value="{{ date('d/m/Y', strtotime($convenience_data->ending_date)) }}" id="ending_date" name="ending_date">
									</div>
									<small>* Selewat-lewatnya 12:00PM / * At the latest 12:00PM</small>
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
										<select class="form-control selectpicker" name="convenience_category" id="convenience_category" data-live-search="true">
											@foreach($categories as $category)
												<option value="{{ $category->convenience_category->id }}"{{ ($category->convenience_category->id == $convenience_data->convenience_category_id ? ' selected' : '') }}>{{ $category->convenience_category->name }}</option>
											@endforeach
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
										
										@if(!empty($convenience_data->applicant_convenience_people))
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
													<select class="form-control selectpicker" name="{{ $people->person }}" id="{{ $people->person }}" data-live-search="true" data-dropup-auto="false">
														<option disabled selected value>Pilih Jumlah</option>
														
														@if(!empty($slots) OR $slots != 0)
															@for($i = 1; $i <= $slots; $i++)
																<option value="{{ $i }}"{{ ($i == $people->capacity ? ' selected' : '') }}>{{ $i }}</option>
															@endfor
														@endif
													</select>
													{{-- <input type="number" class="form-control" value="{{ $people->capacity }}" id="{{ $people->person }}" name="{{ $people->person }}" readonly> --}}
												</div>
											@endforeach
										@else

											<div class="form-group">
												<label class="control-label">Kanak-kanak <small><i>Childrens</i></small></label>
												<select class="form-control selectpicker" name="children" title="Kanak-kanak" id="children" data-live-search="true" data-dropup-auto="false">
													<option disabled selected value>Pilih Jumlah</option>
													@if(!empty($slots) OR $slots != 0)
														@for($i = 1; $i <= $slots; $i++)
															<option value="{{ $i }}">{{ $i }}</option>
														@endfor
													@endif
												</select>
												{{-- <input type="number" class="form-control" value="" id="children" name="children"> --}}
											</div>
											<div class="form-group">
												<label class="control-label">Pelajar <small><i>Student</i></small></label>
												<select class="form-control selectpicker" name="student" title="Pelajar" id="student" data-live-search="true" data-dropup-auto="false">
													<option disabled selected value>Pilih Jumlah</option>
													@if(!empty($slots) OR $slots != 0)
														@for($i = 1; $i <= $slots; $i++)
															<option value="{{ $i }}">{{ $i }}</option>
														@endfor
													@endif
												</select>
												{{-- <input type="number" class="form-control" value="" id="student" name="student"> --}}
											</div>
											<div class="form-group">
												<label class="control-label">Dewasa <small><i>Adult</i></small></label>
												<select class="form-control selectpicker" name="adult" title="Dewasa" id="adult" data-live-search="true" data-dropup-auto="false">
													<option disabled selected value>Pilih Jumlah</option>
													@if(!empty($slots) OR $slots != 0)
														@for($i = 1; $i <= $slots; $i++)
															<option value="{{ $i }}">{{ $i }}</option>
														@endfor
													@endif
												</select>
												{{-- <input type="number" class="form-control" value="" id="adult" name="adult"> --}}
											</div>
										@endif

									</div>
									
									<div id="unitdetail" style="display: {!! $display_unit !!}">
										<div class="form-group">
											<label class="control-label">Unit {{ $convenience_data->capacity }}<small><i>Unit</i></small></label>
											@php $participantUnit = ($convenience_data->convenience_category_id != '2' OR $convenience_data->convenience_category_id != '3' ? $convenience_data->participant : '') @endphp
											{{-- {{ dd($slots) }} --}}
											@if($slots >= 0)
												<select class="form-control selectpicker" name="unit" id="unit" data-live-search="true">
													@for($i = 1; $i < $slots; $i++)
														<option value="{{ $i }}"{{ ($convenience_data->participant == $i ? ' selected' : '') }}>{{ $i }} </option>
													@endfor
												</select>
											@else
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="unitdata" style="display: {!! $display_unit !!}">
										<div class="form-group{{ ($errors->has('category') ? ' has-error' : '') }}">
											<label class="control-label">Kategori <small><i>Category</i></small></label>
											<select class="form-control selectpicker" name="category" id="category" data-live-search="true">
							

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
											<select class="form-control selectpicker" name="nationality" id="nationality" data-live-search="true">
							
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
							<p><b>Pengakuan Pemohon</p>
							<p>Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan Pemohon & Peserta semasa menjalankan aktiviti adalah tanggungjawab sendiri.</p>
							<p><i>I acknowledge that the information provided above is true. The government will not be held responsible if there are any difficulties that arise from incorrect information. The safety of hiker while conducting activities the responsibility of its own</i></p>
						
							<div class="form-group{{ ($errors->has('declaration_name') ? ' has-error' : '') }}">
								<label class="control-label">Nama Penuh <small><i>Full Name</i></small></label>
								<input type="text" class="form-control" value="{{ Auth::user()->name }}" id="declaration_name" name="declaration_name" value="" readonly>
								@if($errors->has('declaration_name'))
									<span class="help-error">{{ $errors->first('declaration_name') }}</span>
								@endif
							</div>
							<div class="form-group{{ ($errors->has('declaration_ic') ? ' has-error' : '') }}">
								<label class="control-label">No. KP / No. Passport <small><i>IC No./Passport No.</i></small></label>
								<input type="text" class="form-control" value="{{ Auth::user()->profile->nokp }}" id="declaration_ic" name="declaration_ic" readonly>
								@if($errors->has('declaration_ic'))
									<span class="help-error">{{ $errors->first('declaration_ic') }}</span>
								@endif
							</div>
							<div class="form-group{{ ($errors->has('declaration_date') ? ' has-error' : '') }}">
								<label class="control-label">Tarikh <small><i>Date</i></small></label>
								<input type="text" class="form-control" value="{{ date('d/m/Y', strtotime((!empty($applicant->applicant_convenience_declaration->application_date) ? $applicant->applicant_convenience_declaration->application_date : date('Y-m-d H:i:s')))) }}" name="declaration_date" readonly>
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
			<button type="submit" id="setApplication" class="btn btn-primary pull-right">Kemaskini / Update<div class="ripple-container"></div></button>
			<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('partials.script.convenience')
@endsection
@if(session()->has('status'))
	@if(session()->get('status') == 'failed-capacity')
		@section('modal')
			@include('account.partials.modal.convenience')
		@endsection
	@endif
@endif