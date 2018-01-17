@extends('account.layouts.panel')

@section('content')
				{{-- <div class="panel panel-default panel-jpsm">
				<div class="panel-heading"><h4>Daftar Pengguna</h4></div>
				<div class="panel-body"> --}}

	<div class="container">
		<div class="register-panel">
			@if(session()->has('status'))
				@if(session()->get('status') == 'error')
					<div class="alert alert-danger">Failed</div>
				@endif
			@endif
				@if(!session()->has('check'))
					{{ Form::open(['url' => 'account/register-check']) }}
						<fieldset>
							<legend>Maklumat Kewarganegaraan</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('citizencheck') ? ' has-error' : '') }}">
										<input type="radio" id="citizenUserCheck" name="citizencheck"{{ ((request()->old('citizencheck') == '' OR (request()->old('citizencheck') == '1')) ? ' checked' : '') }} value="1"> <label for="citizenUserCheck">Warganegara</label>
										@if($errors->has('citizencheck'))
											<span class="help-block">{{ $errors->first('citizencheck') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('citizencheck') ? ' has-error' : '') }}">
										<input type="radio" id="notcitizenUserCheck" name="citizencheck" {{ (request()->old('citizencheck') == '0' ? ' checked' : '') }} value="0"> <label for="notcitizenUserCheck">Bukan Warganegara</label>
										@if($errors->has('citizencheck'))
											<span class="help-block">{{ $errors->first('citizencheck') }}</span>
										@endif
									</div>
								</div>
							</div>
							
						</fieldset>
						<fieldset>
							<legend>Maklumat Akaun</legend>
							<div class="form-group{{ ($errors->has('usernamecheck') ? ' has-error' : '') }}">
								<label for="idUserCitizen">ID Pengguna/No. Kp</label>
								<input type="text" id="idUserCitizen" name="usernamecheck" class="form-control" placeholder="" value="{{ request()->old('usernamecheck') }}" data-maxsize="12">
								@if($errors->has('usernamecheck'))
									<span class="help-block">{{ $errors->first('usernamecheck') }}</span>
								@endif
							</div>
						</fieldset>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Seterusnya</button>
						</div>
					{{ Form::close() }}
				@else
					{{ Form::open(['url' => 'account/register']) }}
						<fieldset>
							<legend>Maklumat Kewarganegaraan</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('citizen') ? ' has-error' : '') }}">
										<input type="radio" id="citizenUser" name="citizen"{{ ((request()->old('citizen') == '' OR (request()->old('citizen') == '1')) ? ' checked' : '') }} value="1"> <label for="citizenUser">Warganegara</label>
										@if($errors->has('citizen'))
											<span class="help-block">{{ $errors->first('citizen') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('citizen') ? ' has-error' : '') }}">
										<input type="radio" id="notcitizenUser" name="citizen" {!! (((request()->old('citizen') == '0') OR (session()->get('citizen') == '0')) ? ' checked' : '') !!} value="0"> <label for="notcitizenUser">Bukan Warganegara</label>
										@if($errors->has('citizen'))
											<span class="help-block">{{ $errors->first('citizen') }}</span>
										@endif
									</div>
								</div>
							</div>
							
						</fieldset>
						<fieldset id="accountcitizen"{!! ((request()->old('citizen') == '0' OR session()->get('citizen') == '0') ? ' style="display: none"' : '') !!}>
							<legend>Maklumat Akaun</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('usernamecitizen') ? ' has-error' : '') }}">
										<label for="idUserCitizen">ID Pengguna/No. Kp</label>
										<input type="text" id="idUserCitizen" name="usernamecitizen" class="form-control" placeholder="Masukan ID Pengguna" value="{{ (!empty(request()->old('usernamecitizen')) ? request()->old('usernamecitizen') : session()->get('username')) }}" data-maxsize="12" readonly>
										@if($errors->has('usernamecitizen'))
											<span class="help-block">{{ $errors->first('usernamecitizen') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('emailcitizen') ? ' has-error' : '') }}">
										<label for="emailUserCitizen">Email</label>
										<input type="text" id="emailUserCitizen" name="emailcitizen" class="form-control" placeholder="" value="{{ request()->old('emailcitizen') }}">
										@if($errors->has('emailcitizen'))
											<span class="help-block">{{ $errors->first('emailcitizen') }}</span>
										@endif
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset id="accountnoncitizen"{!! ((request()->old('citizen') == '1' OR session()->get('citizen') == '1') ? ' style="display: none"' : '') !!}>
							<legend>Maklumat Akaun</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('usernamenoncitizen') ? ' has-error' : '') }}">
										<label for="idUserNoncitizen">ID Pengguna/No. Passport</label>
										<input type="text" id="idUserNoncitizen" name="usernamenoncitizen" class="form-control" placeholder="" value="{{ (!empty(request()->old('usernamenoncitizen')) ? request()->old('usernamenoncitizen') : session()->get('username')) }}" readonly>
										@if($errors->has('usernamenoncitizen'))
											<span class="help-block">{{ $errors->first('usernamenoncitizen') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('emailnoncitizen') ? ' has-error' : '') }}">
										<label for="emailUserNoncitizen">Email</label>
										<input type="text" id="emailUserNoncitizen" name="emailnoncitizen" class="form-control" placeholder="you@domain.com" value="{{ request()->old('emailnoncitizen') }}">
										@if($errors->has('emailnoncitizen'))
											<span class="help-block">{{ $errors->first('emailnoncitizen') }}</span>
										@endif
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Maklumat Akaun</legend>
							<div class="form-group{{ ($errors->has('fullname') ? ' has-error' : '') }}">
								<label for="nameUser">Nama Penuh</label>
								<input type="text" id="nameUser" name="fullname" class="form-control" placeholder="" value="{{ request()->old('fullname') }}">
								@if($errors->has('fullname'))
									<span class="help-block">{{ $errors->first('fullname') }}</span>
								@endif
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('birthday') ? ' has-error' : '') }}">
										<label for="dateOfBirth">Tarikh Lahir</label>
										<input type="text" id="dateOfBirth" name="birthday" class="form-control datepicker" placeholder="" value="{{ (!empty(request()->old('birthday')) ? request()->old('birthday') : session()->get('birthday')) }}"{{ (((request()->old('citizen') == '1') OR (session()->get('citizen') == '1')) ? ' readonly' : '') }}>
										@if($errors->has('birthday'))
											<span class="help-block">{{ $errors->first('birthday') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('age') ? ' has-error' : '') }}">
										<label for="ageUser">Umur</label>
										<input type="number" id="ageUser" name="age" class="form-control date" placeholder="" value="{{ (!empty(request()->old('age')) ? request()->old('age') : session()->get('age')) }}" readonly>
										@if($errors->has('age'))
											<span class="help-block">{{ $errors->first('age') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group{{ ($errors->has('phonecode') ? ' has-error' : '') }}">
										<label for="phonecodeUser">Kod</label>
										<select class="form-control select2" name="phonecode" data-placeholder="Select country code">
											@foreach(config('listcountry') as $country)
												<option{{ ($country['name'] == 'MALAYSIA' ? ' selected' : '') }}>+{{ $country['code'] }}</option>
											@endforeach
										</select>
										@if($errors->has('phonecode'))
											<span class="help-block">{{ $errors->first('phonecode') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group{{ ($errors->has('phone') ? ' has-error' : '') }}">
										<label for="phoneUser">No Telefon</label>
										<input type="number" id="phoneUser" name="phone" class="form-control" placeholder="" value="{{ request()->old('phone') }}" data-maxsize="12">
										@if($errors->has('phone'))
											<span class="help-block">{{ $errors->first('phone') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}">
								<label for="addressUser">Alamat</label>
								<textarea class="form-control" id="addressUser" name="address" rowspan="5" placeholder="">{{ request()->old('address') }}</textarea>
								@if($errors->has('address'))
									<span class="help-block">{{ $errors->first('address') }}</span>
								@endif
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
										<label for="postcode">Poskod</label>
										<input type="number" data-maxsize="5" id="postcode" name="postcode" class="form-control" placeholder="" value="{{ (!empty(request()->old('postcode')) ? request()->old('postcode') : session()->get('postcode')) }}">
										@if($errors->has('postcode'))
											<span class="help-block">{{ $errors->first('postcode') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
										<label for="cityUser">Bandar</label>
										<input type="text" id="cityUser" name="city" class="form-control" placeholder="" value="{{ (!empty(request()->old('city')) ? request()->old('city') : session()->get('city')) }}">
										@if($errors->has('city'))
											<span class="help-block">{{ $errors->first('city') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
										<label for="stateUser">Negeri</label>
										<select class="form-control select2" name="state" data-placeholder="">
											<option></option>
											@foreach($states as $state)
												<option value="{{ $state->id }}">{{ $state->name }}</option>
											@endforeach
										</select>
										@if($errors->has('state'))
											<span class="help-block">{{ $errors->first('state') }}</span>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group{{ ($errors->has('country') ? ' has-error' : '') }}">
										<label for="countryUser">Negara</label>
										<select class="form-control select2" name="country" data-placeholder="">
											<option></option>
											@foreach($countries as $country)
												<option value="{{ $country->id }}"{{ ($country->code == 'MY' ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
											@endforeach
										</select>
										@if($errors->has('country'))
											<span class="help-block">{{ $errors->first('country') }}</span>
										@endif
									</div>
								</div>
							</div>
							
							
						</fieldset>
						<div class="form-group{{ ($errors->has('agreement') ? ' has-error' : '') }}">
							<input type="checkbox" id="agreement" name="agreement"> <label for="agreement">Saya mengakui bahawa segala maklumat <br />yang diberi dan dikemukakan di dalam sistem ini adalah benar.</label>
							@if($errors->has('agreement'))
								<span class="help-block">{{ $errors->first('agreement') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<submit type="button" class="btn btn-default btn-block reset">Set Semula</submit>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Hantar</button>
								</div>
							</div>
						</div>
					{{ Form::close() }}
				@endif
				{{-- </div>
			</div> --}}
		</div>
	</div>
@endsection

@if(session()->has('status'))
	@if(session()->get('status') == 'success')
		@section('modal')
			@include('account.partials.modal.register')
		@endsection
		
	@endif
@endif

@section('script')
	@include('account.partials.script.register')
@endsection