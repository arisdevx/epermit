(function($){

	'use strict';

	$(document).ready(function(){

		$('input[type="number"]').on('change keyup keydown', function(){
			if($(this).val() < 0)
			{
				$(this).val(0);
			}
		});
		
		$('#loginSubmit').on('click', function(){
			$.ajax({
				type: 'POST',
				url: url + '/auth/login_ajax',
				data: {
					_token: _token,
					username: $('#loginUsername').val(),
					password: $('#loginPassword').val()
				},
				success: function(data)
				{
					if(data.error == true)
					{
						$('#loginAlert').show();
						$('#loginAlert p').html(data.message);
					}
					else
					{
						$('#loginAlert').hide();
						$('#loginAlert p').remove();

						window.location.href = data.redirect;
					}
				}
			});
		});

		$('#resetPasswordLink').on('click', function(){
			$('#myModal').modal('hide');
			$('#resetPasswordModal').modal('show');
		});

		$('#resetSubmit').on('click', function(){
			$('#resetPasswordAlert').hide();
			$(this).html('Loading...');
			$('#resetEmail').prop('disabled', true);
			$.ajax({
				type: 'POST',
				url: url + '/account/forgot-password/action_ajax',
				data: {
					_token: _token,
					email: $('#resetEmail').val()
				},
				success: function(data)
				{
					if(data.error == false)
					{
						$('#resetPasswordAlert').removeClass('alert-danger');
						$('#resetPasswordAlert').addClass('alert-success');
						$('#resetPasswordAlert').html(data.message);
						$('#resetPasswordAlert').show();
					}
					else
					{
						$('#resetPasswordAlert').removeClass('alert-success');
						$('#resetPasswordAlert').addClass('alert-danger');
						$('#resetPasswordAlert').html(data.message);
						$('#resetPasswordAlert').show();
					}
					$('#resetEmail').val('');
					$('#resetSubmit').html('Hantar');
					$('#resetEmail').prop('disabled', false);
					console.log(data);
				}
			});
		});

		$('.select2').select2();

		

		$('.datepicker').datetimepicker({
			i18n:{
				de:{
					months:[
					'Januar','Februar','März','April',
					'Mai','Juni','Juli','August',
					'September','Oktober','November','Dezember',
					],
					dayOfWeek:[
					"So.", "Mo", "Di", "Mi", 
					"Do", "Fr", "Sa.",
					]
				}
			},
			timepicker:false,
			format:'d/m/Y',
			scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
		});

		$('.timepicker').datetimepicker({
			datepicker:false,
			format:'H:i',
		});

		$('body').on('change', '.uploadBtn', function(){
			var id = $(this).data('id');

			$('#uploadFakePath-' + id).val($(this).val());
		});

		$('body').on('change keyup keydown', '#hiker_ic', function(){
			
			if($('#hiker_nationality').is(':checked'))
			{
				var kp = $(this).val();

				if(kp.length > 8)
				{
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

					$('#hiker_birthday').val(birthday);
					$('#hiker_age').val(age);
				}
			}
		});

		$('body').on('change', '#hiker_nationality', function(){
			if($(this).is(':checked'))
			{
				$('#hiker_birthday').prop('readonly', true);
				$('#hiker_age').prop('readonly', true);
			}
			else
			{
				$('#hiker_birthday').prop('readonly', false);
				$('#hiker_age').prop('readonly', false);
			}
		});
		$('body').on('click', '#non_hiker_nationality', function(){
			if(!$(this).is(':checked'))
			{
				$('#hiker_birthday').prop('readonly', true);
				$('#hiker_age').prop('readonly', true);
			}
			else
			{
				$('#hiker_birthday').prop('readonly', false);
				$('#hiker_age').prop('readonly', false);
				$('#hiker_birthday').val('');
				$('#hiker_age').val('');
			}
		});

		$('body').on('change', '#hiker_fullname', function(){
			$('#declaration_name').val($(this).val());
		})
		$('body').on('change', '#hiker_ic', function(){
			$('#declaration_ic').val($(this).val());
		})

		$('body').on('change', '#hiker_nationality', function(){
			if($(this).is(':checked'))
			{
				var kp = $('#hiker_ic').val();
				if(kp.length > 8)
				{
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

					$('#hiker_birthday').val(birthday);
					$('#hiker_age').val(age);
				}
			}
		});

		$('.class-name').each(function(i, item){
			$(item).keypress(function (e) {
			    var txt = String.fromCharCode(e.which);
			    if (!txt.match(/[A-Za-z&. ]/)) {
			        return false;
			    }
			});
		});

		$('.class-id').keypress(function (e) {
		    var txt = String.fromCharCode(e.which);
		    if (!txt.match(/[A-Za-z0-9&. ]/)) {
		        return false;
		    }
		});
	});

})(jQuery);

// document.getElementById("uploadBtn").onchange = function () {
//     document.getElementById("uploadFile").value = this.value;
// };