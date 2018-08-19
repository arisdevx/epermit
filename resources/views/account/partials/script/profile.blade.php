<script type="text/javascript">
	(function($){
		'use strict';
		$(document).ready(function(){
			$('.datepicker').datetimepicker({
				timepicker:false,
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});

			$('#nokp').on('change', function(){
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
				var theDate = new Date(birthday);
				if (Object.prototype.toString.call(theDate) === "[object Date]") {
				  	// it is a date
				  	if (isNaN(theDate.getTime())) {  // d.valueOf() could also work
				    	// alert('not valid date');
				  	} else {
				    	$('#birthday').val(birthday);
				    	$('#age').val(age);
				  	}
				} else {
				  	// alert('not date');
				}
				
				
				
			});
		});
	})(jQuery);
</script>