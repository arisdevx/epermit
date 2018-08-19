@extends('account.layouts.backend.panel')

@section('content')
	@if(session()->has('status'))
		@if(session()->get('status') == 'success')
			<div class="alert alert-success">
		        <span>Maklumat profil anda berjaya dikemaskini. </span>
		    </div>
		@else
			<div class="alert alert-danger">
		        <span>Maklumat profil anda gagal dikemaskini. </span>
		    </div>
		@endif
	@endif
	@php($birthday = '')
	@php($year = '')

	@if($user->profile->citizen == '1')

		@php($getBirthday = $user->profile->nokp)
		@php($arrayBirthday = str_split($getBirthday, 2))
		
		@if($arrayBirthday[0] > 50)
			@php($year = '19' . $arrayBirthday[0])
		@else
			@php($year = '20' . $arrayBirthday[0])
		@endif

		@php($birthday = $arrayBirthday[2] . '/' . $arrayBirthday[1] . '/' . $year)

	@else
		@php($birthday = date('d/m/Y', strtotime($user->profile->birthday)))
	@endif
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title"><strong>Profil Saya</strong></h4>
			<p class="category"><strong><i>My Profile</i></strong></p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('account/member-profile/' . auth()->guard('applicant')->user()->id), 'method' => 'PUT']) }}
				<h4>Tukar Password / <i>Change Password</i></h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('password') ? ' has-error' : '') }}">
							<label class="control-label">Kata Laluan Baru <br /><i>New Password</i></label>
							<input type="password" name="password" value="" class="form-control" autocomplete="offnew-password">
							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('password_confirmation') ? ' has-error' : '') }}">
							<label class="control-label">Pengesahan Kata Laluan Baru<br /><i>Confirm New Password</i></label>
							<input type="password" name="password_confirmation" value="" class="form-control" autocomplete="new-password">
							@if($errors->has('password_confirmation'))
								<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
							@endif
						</div>
					</div>
				</div>
				<hr>
				<h4>Maklumat Peribadi / <i>Personal Information</i></h4>
				
				<div class="form-group{{ ($errors->has('name') ? ' has-error' : '') }}">
					<label class="control-label">Nama Penuh<br /><i>Full Name</i></label>
					<input type="text" name="name" class="form-control" value="{{ $user->name }}">
					@if($errors->has('name'))
						<span class="help-error">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Status <br /><i>Status</i></label>
							<input type="text" class="form-control" value="{{ ($user->profile->citizen == '1' ? 'Warganegara' : 'Bukan Warganegara') }}" disabled>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">No Kad Pengenalan / No Passport<br /><i>Identity Card No / Passport No</i></label>
							<input type="text" name="nokp" id="nokp" class="form-control" value="{{ ($user->profile->citizen == '1' ? $user->profile->nokp : $user->profile->passport) }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group{{ ($errors->has('birthday') ? ' has-error' : '') }}">
							<label class="control-label">Tarikh Lahir<br /><i>Date of Birth</i></label>
							<input type="text" name="birthday" id="birthday" class="form-control datepicker" value="{{ $birthday }}">
							@if($errors->has('birthday'))
								<span class="help-error">{{ $errors->first('birthday') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group{{ ($errors->has('age') ? ' has-error' : '') }}">
							<label class="control-label">Umur<br /><i>Age</i></label>
							<input type="number" name="age" id="age" class="form-control" value="{{ $user->profile->age }}" min="0">
							@if($errors->has('age'))
								<span class="help-error">{{ $errors->first('age') }}</span>
							@endif
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group{{ ($errors->has('email') ? ' has-error' : '') }}">
							<label class="control-label">Email<br /><i>Email</i></label>
							<input type="email" name="email" class="form-control" value="{{ (!empty(request()->old('email')) ? request()->old('email') : $user->email) }}">
							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						
					</div>
					<div class="col-md-4">
						<div class="form-group{{ ($errors->has('phone') ? ' has-error' : '') }}">
							<label class="control-label">No Telefon<br /><i>Phone Number</i></label>
							<input type="number" name="phone" class="form-control" value="{{ $user->profile->phone }}" data-maxsize="15" min="0">
							@if($errors->has('phone'))
								<span class="help-error">{{ $errors->first('phone') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
							<label class="control-label">Poskod<br /><i>Post Code</i></label>
							<input type="number" name="postcode" class="form-control" value="{{ $user->profile->postcode }}" data-maxsize="5" min="0">
							@if($errors->has('postcode'))
								<span class="help-error">{{ $errors->first('postcode') }}</span>
							@endif
						</div>
						<input type="hidden" name="phonecode" value="{{ $user->profile->phonecode }}">
						{{-- <div class="form-group{{ ($errors->has('phonecode') ? ' has-error' : '') }}">
							<label class="control-label">Kod<br /><i>Code</i></label>
							<select class="form-control select2" name="phonecode" data-placeholder="Select country code" style="margin-bottom: 20px;">
								@foreach(config('listcountry') as $country)
									<option{{ ($country['code'] == $user->profile->phonecode ? ' selected' : '') }}>+{{ $country['code'] }}</option>
								@endforeach
							</select>
							@if($errors->has('phonecode'))
								<span class="help-block">{{ $errors->first('phonecode') }}</span>
							@endif
						</div> --}}
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}">
							<label class="control-label">Alamat<br /><i>Address</i></label>
							<textarea class="form-control" name="address" rows="10">{{ $user->profile->address_1 }}</textarea>
							@if($errors->has('address'))
								<span class="help-error">{{ $errors->first('address') }}</span>
							@endif
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
							<label class="control-label">Bandar<br /><i>City</i></label>
							<input type="text" name="city" class="form-control" value="{{ $user->profile->city }}">
							@if($errors->has('city'))
								<span class="help-error">{{ $errors->first('city') }}</span>
							@endif
						</div>
						<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
							<label class="control-label">Negeri<br /><i>State</i></label>
							<select class="form-control select2" name="state" data-placeholder="" style="width: 100%">
								<option></option>
								@foreach($states as $state)
									<option value="{{ $state->id }}"{{ ($state->id == $user->profile->state ? ' selected' : '') }}>{{ $state->name }}</option>
								@endforeach
							</select>
							@if($errors->has('state'))
								<span class="help-block">{{ $errors->first('state') }}</span>
							@endif
						</div>
						<div class="form-group{{ ($errors->has('country') ? ' has-error' : '') }}">
							<label class="control-label">Negara<br /><i>Country</i></label>
							<select class="form-control select2" name="country" data-placeholder="" style="width: 100%">
								<option></option>
								@foreach($countries as $country)
									<option value="{{ $country->id }}"{{ ($country->id == $user->profile->country ? ' selected' : '') }}>{{ ucwords(strtolower($country->name)) }}</option>
								@endforeach
							</select>
							@if($errors->has('country'))
								<span class="help-block">{{ $errors->first('country') }}</span>
							@endif
						</div>
					</div>
				</div>

				<div class="pull-left">
					<label for="agreement" style="color: #333333"><input type="checkbox" name="agreement" id="agreement"> Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar. <br><p style="margin-left: 20px"><i>I acknowledge that all information given and presented in this system is true.</i></p>
</label>
					@if($errors->has('agreement'))
						<p class="help-block" style="color: red">{{ $errors->first('agreement') }}</p>
					@endif
				</div>
				<button type="submit" class="btn btn-primary pull-right">Simpan<div class="ripple-container"></div></button>
				<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

@section('scripts')
	@include('account.partials.script.profile')
@endsection
