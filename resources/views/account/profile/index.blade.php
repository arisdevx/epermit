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
	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Biodata</h4>
			<p class="category">Kemaskini Biodata Pemohon</p>
		</div>

		<div class="card-content">
			{{ Form::open(['url' => url('account/member-profile/' . auth()->guard('applicant')->user()->id), 'method' => 'PUT']) }}
				<h4>Maklumat Akaun</h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">ID Pengguna (No K.P/Passport)</label>
							<input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('password') ? ' has-error' : '') }}">
							<label class="control-label">Kata Laluan Baru</label>
							<input type="password" name="password" class="form-control">
							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('email') ? ' has-error' : '') }}">
							<label class="control-label">Email</label>
							<input type="text" name="email" class="form-control" value="{{ (!empty(request()->old('email')) ? request()->old('email') : $user->email) }}">
							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('password_confirmation') ? ' has-error' : '') }}">
							<label class="control-label">Ulangi Kata Laluan Baru</label>
							<input type="password" name="password_confirmation" class="form-control">
							@if($errors->has('password_confirmation'))
								<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
							@endif
						</div>
					</div>
				</div>

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

				{{-- <h4>Maklumat Akaun</h4> --}}
				<div class="form-group{{ ($errors->has('name') ? ' has-error' : '') }}">
					<label class="control-label">Nama Penuh</label>
					<input type="text" name="name" class="form-control" value="{{ $user->name }}">
					@if($errors->has('name'))
						<span class="help-error">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">No K/P</label>
							<input type="number" name="nokp" class="form-control" value="{{ ($user->profile->citizen == '1' ? $user->profile->nokp : $user->profile->passport) }}" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('birthday') ? ' has-error' : '') }}">
							<label class="control-label">Tarikh Lahir</label>
							<input type="text" name="birthday" class="form-control datepicker" value="{{ $birthday }}">
							@if($errors->has('birthday'))
								<span class="help-error">{{ $errors->first('birthday') }}</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group{{ ($errors->has('phonecode') ? ' has-error' : '') }}">
									<label class="control-label">Kod</label>
									<select class="form-control select2" name="phonecode" data-placeholder="Select country code">
										@foreach(config('listcountry') as $country)
											<option{{ ($country['code'] == $user->profile->phonecode ? ' selected' : '') }}>+{{ $country['code'] }}</option>
										@endforeach
									</select>
									@if($errors->has('phonecode'))
										<span class="help-block">{{ $errors->first('phonecode') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group{{ ($errors->has('phone') ? ' has-error' : '') }}">
									<label class="control-label">No Telefon</label>
									<input type="text" name="phone" class="form-control" value="{{ $user->profile->phone }}">
									@if($errors->has('phone'))
										<span class="help-error">{{ $errors->first('phone') }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('age') ? ' has-error' : '') }}">
							<label class="control-label">Umur</label>
							<input type="number" name="age" class="form-control" value="{{ $user->profile->age }}">
							@if($errors->has('age'))
								<span class="help-error">{{ $errors->first('age') }}</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}" style="margin-bottom: 17px !important;">
							<label class="control-label">Alamat</label>
							<textarea class="form-control" name="address" rows="4">{{ $user->profile->address_1 }}</textarea>
							@if($errors->has('address'))
								<span class="help-error">{{ $errors->first('address') }}</span>
							@endif
						</div>
						<div class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
							<label class="control-label">Postkod</label>
							<input type="text" name="postcode" class="form-control" value="{{ $user->profile->postcode }}">
							@if($errors->has('postcode'))
								<span class="help-error">{{ $errors->first('postcode') }}</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
							<label class="control-label">Bandar</label>
							<input type="text" name="city" class="form-control" value="{{ $user->profile->city }}">
							@if($errors->has('city'))
								<span class="help-error">{{ $errors->first('city') }}</span>
							@endif
						</div>
						<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
							<label class="control-label">Negeri</label>
							<select class="form-control select2" name="state" data-placeholder="">
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
							<label class="control-label">Negeri</label>
							<select class="form-control select2" name="country" data-placeholder="">
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
					<input type="checkbox" name="agreement" id="agreement"> <label for="agreement">Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar.
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