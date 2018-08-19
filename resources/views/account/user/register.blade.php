<!DOCTYPE html>
<html>
<head>
	<title>Register page</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/account/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/account/jquery.datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/registerpage.css') }}">
	{{-- <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> --}}


</head>
<body{!! (session()->has('check') ? ' class="scroll"' : '') !!}>
	<div class="wrapper">
		<div class="register-page">
			<div class="register-page-container container">
				<div class="row equal">
		            <div class="col-md-4 no-float register-page-left" style="height: 679px">
	            		<a href="{{ url('/') }}" class="btn btn-danger pull-right" style="background-color: #e40001">Utama / Home</a>
	                    <div class="clearfix"></div>
	                    <div class="page-left-content">
	                    	<h3>Selamat Datang Ke Sistem Permohonan Permit, Jabatan Perhutanan Semenanjung Malaysia</h3>
	                    	<h4 style="margin-top: 20px;">
		                    	<p>1. Pengguna yang ingin membuat permohonan permit memasuki hutan hendaklah memohon melalui sistem.</p>
		                    	<p>2. Daftar akauan pengguna sistem.</p>
		                    	<p>3. Notifikasi kata laluan akan dihantar ke email pengguna.</p>
		                    	<p>4. Log Masuk ke sistem untuk membuat permohonan permit dan tempahan.</p>
	                    	</h4>
	                    	<small><i>
	                    		Welcome to Permit Application System, Forestry Department of Malaysia
		                    	
		                    	<p>1. Users who wish to apply for a permit to enter the forest must apply through the system.</p>
		                    	<p>2. List of system user accounts.</p>
		                    	<p>3. Notification of passwords will be sent to the user's email.</p>
		                    	<p>4. Login to the system to apply for permit and booking.</p>
		                    	
	                    	</i></small>
	                    </div>
		            </div>
		            <div class="col-md-8 no-float register-page-right">
	                    @if(session()->has('status'))
							@if(session()->get('status') == 'error')
								<div class="alert alert-danger">Failed</div>
							@endif
							{{-- @if(session()->get('status') == 'success')
								<div class="alert alert-success">Berjaya pendaftaran akauan baru <br> your registration has been successfully</div>
							@endif --}}
						@endif
						@if(!session()->has('check'))
							{{ Form::open(['url' => 'account/register-check']) }}
								<h3 style="width: 100%">Pendaftaran Akaun / <i>New Registration</i></h3>
								<fieldset>
									<legend>Maklumat Kewarganegaraan / <i>Citizenship Information</i></legend>
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
									<legend>Maklumat Akaun / <i>User Information</i></legend>
									<div class="form-group{{ ($errors->has('usernamecheck') ? ' has-error' : '') }}">
										<label for="idUserCitizen" id="idUserCitizenLabel">No Kad Pengenalan<br><i>No Identity Card</i></label>
										<input type="text" id="idUserCitizen" name="usernamecheck" class="form-control-custom" placeholder="891230101234" value="{{ request()->old('usernamecheck') }}" data-maxsize="12">
										@if($errors->has('usernamecheck'))
											<span class="help-block">{!! $errors->first('usernamecheck') !!}</span>
										@endif
									</div>
								</fieldset>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block btn-lg">Seterusnya / Continue</button>
								</div>
								
							{{ Form::close() }}
						@else
							{{ Form::open(['url' => 'account/register']) }}
								{{-- <div>
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
									
								</div>
								<hr> --}}
								<input type="hidden" name="citizen" value="{{ ((session()->get('citizen') == '1') ? '1' : '0') }}">
								<div class="form-group{{ ($errors->has('fullname') ? ' has-error' : '') }}">
									<label for="nameUser">
										@if(session()->get('citizen') == '1')
											Nama Penuh seperti di kad pengenalan<br /><i>Full Name as per IC</i>
										@else
											Nama Penuh seperti di passport<br /><i>Full Name as per Passport</i>
										@endif
									</label>
									<input type="text" id="nameUser" name="fullname" class="form-control-custom" placeholder="" value="{{ request()->old('fullname') }}">
									@if($errors->has('fullname'))
										<span class="help-block">{{ $errors->first('fullname') }}</span>
									@endif
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="idUserCitizenStatusText">Status<br><i>Status</i></label>
											<input type="text" class="form-control-custom" value="{{ (session()->get('citizen') == '1' ? 'Warganegara' : 'Bukan Warganegara') }}" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="accountcitizen"{!! ((request()->old('citizen') == '0' OR session()->get('citizen') == '0') ? ' style="display: none"' : '') !!}>
											<div class="form-group{{ ($errors->has('usernamecitizen') ? ' has-error' : '') }}">
												<label for="idUserCitizen">No Kad Pengenalan<br><i>Identity Card No</i></label>
												<input type="text" id="idUserCitizen" name="usernamecitizen" class="form-control-custom" placeholder="Masukan ID Pengguna" value="{{ (!empty(request()->old('usernamecitizen')) ? request()->old('usernamecitizen') : session()->get('username')) }}" data-maxsize="12" readonly>
												@if($errors->has('usernamecitizen'))
													<span class="help-block">{{ $errors->first('usernamecitizen') }}</span>
												@endif
											</div>
										</div>
										<div class="accountnoncitizen"{!! ((request()->old('citizen') == '1' OR session()->get('citizen') == '1') ? ' style="display: none"' : '') !!}>
											<div class="form-group{{ ($errors->has('usernamenoncitizen') ? ' has-error' : '') }}">
												<label for="idUserNoncitizen">ID Pengguna/No. Passport<br><i>ID Card / Passport No</i></label>
												<input type="text" id="idUserNoncitizen" name="usernamenoncitizen" class="form-control-custom" placeholder="" value="{{ (!empty(request()->old('usernamenoncitizen')) ? request()->old('usernamenoncitizen') : session()->get('username')) }}" readonly>
												@if($errors->has('usernamenoncitizen'))
													<span class="help-block">{{ $errors->first('usernamenoncitizen') }}</span>
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('birthday') ? ' has-error' : '') }}">
											<label for="dateOfBirth">Tarikh Lahir <br><i>Date of Birth</i></label>
											<input type="text" id="dateOfBirth" name="birthday" class="form-control-custom datepicker" placeholder="" value="{{ (!empty(request()->old('birthday')) ? request()->old('birthday') : session()->get('birthday')) }}"{{ (((request()->old('citizen') == '1') OR (session()->get('citizen') == '1')) ? ' readonly' : '') }}>
											@if($errors->has('birthday'))
												<span class="help-block">{{ $errors->first('birthday') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('age') ? ' has-error' : '') }}">
											<label for="ageUser">Umur <br><i>Age</i></label>
											<input type="number" id="ageUser" name="age" class="form-control-custom date" placeholder="" value="{{ (!empty(request()->old('age')) ? request()->old('age') : session()->get('age')) }}" readonly>
											@if($errors->has('age'))
												<span class="help-block">{{ $errors->first('age') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="accountcitizen"{!! ((request()->old('citizen') == '0' OR session()->get('citizen') == '0') ? ' style="display: none"' : '') !!}>
											<div class="form-group{{ ($errors->has('emailcitizen') ? ' has-error' : '') }}">
												<label for="emailUserCitizen">Email <br><i>Email</i></label>
												<input type="text" id="emailUserCitizen" name="emailcitizen" class="form-control-custom" placeholder="" value="{{ request()->old('emailcitizen') }}">
												@if($errors->has('emailcitizen'))
													<span class="help-block">{{ $errors->first('emailcitizen') }}</span>
												@endif
											</div>
										</div>
										<div class="accountnoncitizen"{!! ((request()->old('citizen') == '1' OR session()->get('citizen') == '1') ? ' style="display: none"' : '') !!}>
											<div class="form-group{{ ($errors->has('emailnoncitizen') ? ' has-error' : '') }}">
												<label for="emailUserNoncitizen">Email <br><i>Email</i></label>
												<input type="text" id="emailUserNoncitizen" name="emailnoncitizen" class="form-control-custom" placeholder="you@domain.com" value="{{ request()->old('emailnoncitizen') }}">
												@if($errors->has('emailnoncitizen'))
													<span class="help-block">{{ $errors->first('emailnoncitizen') }}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group{{ ($errors->has('phonecode') ? ' has-error' : '') }}">
													<label for="phonecodeUser">Kod Telefon <br><i>Code</i></label>
													<select class="form-control-custom select2" name="phonecode" data-placeholder="Select country code" style="width: 100%">
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
													<label for="phoneUser">No Telefon <br><i>Phone No</i></label>
													<input type="number" id="phoneUser" name="phone" class="form-control-custom" placeholder="" value="{{ request()->old('phone') }}" data-maxsize="12">
													@if($errors->has('phone'))
														<span class="help-block">{{ $errors->first('phone') }}</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group{{ ($errors->has('address') ? ' has-error' : '') }}">
									<label for="addressUser">Alamat <br><i>Address</i></label>
									<input type="text" class="form-control-custom" id="addressUser" name="address" value="{{ request()->old('address') }}">
									@if($errors->has('address'))
										<span class="help-block">{{ $errors->first('address') }}</span>
									@endif
								</div>
								<div class="form-group{{ ($errors->has('city') ? ' has-error' : '') }}">
									<label for="cityUser">Bandar <br><i>City</i></label>
									<input type="text" id="cityUser" name="city" class="form-control-custom" placeholder="" value="{{ (!empty(request()->old('city')) ? request()->old('city') : session()->get('city')) }}">
									@if($errors->has('city'))
										<span class="help-block">{{ $errors->first('city') }}</span>
									@endif
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('postcode') ? ' has-error' : '') }}">
											<label for="postcode">Poskod <br><i>Post Code</i></label>
											<input type="number" data-maxsize="5" id="postcode" name="postcode" class="form-control-custom" placeholder="" value="{{ (!empty(request()->old('postcode')) ? request()->old('postcode') : session()->get('postcode')) }}">
											@if($errors->has('postcode'))
												<span class="help-block">{{ $errors->first('postcode') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('state') ? ' has-error' : '') }}">
											<label for="stateUser">Negeri <br><i>State</i></label>
											<select class="form-control-custom select2" name="state" data-placeholder="">
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
									<div class="col-md-4">
										<div class="form-group{{ ($errors->has('country') ? ' has-error' : '') }}">
											<label for="countryUser">Negara <br><i>Country</i></label>
											<select class="form-control-custom select2" name="country" data-placeholder="">
												<option></option>
												@foreach($countries as $country)
													<option value="{{ $country->id }}"{{ ((!request()->old('country') AND $country->code == 'MY') ? ' selected' : (request()->old('country') == $country->id ? ' selected' : '')) }}>{{ ucwords(strtolower($country->name)) }}</option>
												@endforeach
											</select>
											@if($errors->has('country'))
												<span class="help-block">{{ $errors->first('country') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group{{ ($errors->has('captcha') ? ' has-error' : '') }}">
											<label for="countryUser">Captcha</label>
											<div class="row">
												<div class="col-md-6">
													<p>{!! captcha_img() !!}</p>
												</div>
												<div class="col-md-6"><input type="text" class="form-control-custom form-block" name="captcha"></div>
											</div>
											
											@if($errors->has('captcha'))
												<span class="help-block">{{ $errors->first('captcha') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" style="margin-top: 24px">
											<submit type="button" class="btn btn-default btn-block reset">Set Semula / Reset</submit>
										</div>
									</div>
								</div>
								<div class="form-group{{ ($errors->has('agreement') ? ' has-error' : '') }}">
									<label for="agreement"><input type="checkbox" id="agreement" name="agreement"> Saya mengakui bahawa segala maklumat yang diberi dan dikemukakan di dalam sistem ini adalah benar. <br><i>I acknowledge that all information given and presented in this system is true.</i></label>
									@if($errors->has('agreement'))
										<span class="help-block">{{ $errors->first('agreement') }}</span>
									@endif
								</div>
								
								<div class="row">
									<div class="col-md-offset-8 col-md-4">
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Hantar / Submit</button>
										</div>
									</div>
								</div>
							{{ Form::close() }}
						@endif
		                	
		            </div>
		        </div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Maklumat</h4>
				</div>
				<div class="modal-body">
					<p>Anda telah berjaya mendaftar akaun. Kata laluan telah dihantar ke alamat email anda. Sila semak dan aktifkan akaun sebelum menggunakan sistem ini</p>
					<p><i>Your account has been registered. Your password has been sent to your email address. Please check and activated your account before using this system.</i></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	@if(session()->has('status'))
	@if(session()->get('status') == 'success')
	@endif
	@endif
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/account/jquery.datetimepicker.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/maxlength.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/account/script.js') }}"></script>
	<script type="text/javascript">
		(function($){

			'use strict';
			
			$(document).ready(function(){

				@if(session()->has('status'))
					@if(session()->get('status') == 'success')
						$('#confirmModal').modal('show');
					@endif
				@endif

				$('input[name="citizencheck"]').on('change', function(){
					if($(this).val() == '1')
					{
						$('#idUserCitizenLabel').html('No Kad Pengenalan<br><i>No Identity Card</i>');
						$('#idUserCitizen').attr('placeholder', '891230101234');
					}
					else {
						$('#idUserCitizenLabel').html('No Passport<br><i>Passport No</i>');
						$('#idUserCitizen').attr('placeholder', '');
					}
				});

				$('input[name=citizen]').on('change', function(){
					var data = $(this).val();

					if(data === '1')
					{
						$('.accountcitizen').show();
						$('.accountnoncitizen').hide();
						$('#dateOfBirth').val('');
						$('#dateOfBirth').prop('readonly', true);
						$('#idUserCitizen').val('');
						$('#ageUser').val('');
					}
					else
					{
						$('.accountcitizen').hide();
						$('.accountnoncitizen').show();
						$('#dateOfBirth').val('');
						$('#dateOfBirth').prop('readonly', false);
						$('#idUserNoncitizen').val('');
						$('#ageUser').val('');


					}
				});

				$('#idUserCitizen').keypress(function (e) {
						    var txt = String.fromCharCode(e.which);
						    if (!txt.match(/[A-Za-z0-9&.]/)) {
						        return false;
						    }
						});

				$('#idUserCitizen').on('change', function(){
					var kp = $(this).val();
					var getDate = kp.substring(0, 6);
					var getArray = getDate.match(/.{1,2}/g);
					var year, month, day, dob, age;
					var birthday;
					var today = new Date();

					if(getArray[0] > 60)
					{
						year = 19 + getArray[0];
					}
					else
					{
						year = 20 + getArray[0];
					}

					month = getArray[1];
					day   = getArray[2];

					birthday = day + '/' + month + '/' + year;
					dob = new Date(year + '-' + month + '-' + day);
					age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

					$('#dateOfBirth').val(birthday);
					$('#ageUser').val(age);
					
				});

				$('#dateOfBirth').on('change', function(){
					
					var birthday = $(this).val().split('/');
					var today = new Date();
					var dob      = new Date(birthday[2] + '-' + birthday[1] + '-' + birthday[0]);
					var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

					$('#ageUser').val(age);
					
				});

				$('#registerModal').modal('show');
				$(".reset").click(function() {
				    $(this).closest('form').find("input[type=text], textarea").val("");
				});


			});

		})(jQuery);
	</script>
</body>
</html>