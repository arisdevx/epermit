<script type="text/javascript">
	(function($){

		'use strict';
		
		$(document).ready(function(){

			$('input[name=citizen]').on('change', function(){
				var data = $(this).val();

				if(data === '1')
				{
					$('#accountcitizen').show();
					$('#accountnoncitizen').hide();
					$('#dateOfBirth').val('');
					$('#dateOfBirth').prop('readonly', true);
					$('#idUserCitizen').val('');
					$('#ageUser').val('');
				}
				else
				{
					$('#accountcitizen').hide();
					$('#accountnoncitizen').show();
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