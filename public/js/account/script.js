(function($){

	'use strict';

	$(document).ready(function(){

		console.log('check');

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
		});

		$('body').on('change', '#hiker_nationality', function(){
			if($(this).is(':checked'))
			{
				var kp = $('#hiker_ic').val();
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
		});
	});

})(jQuery);

// document.getElementById("uploadBtn").onchange = function () {
//     document.getElementById("uploadFile").value = this.value;
// };