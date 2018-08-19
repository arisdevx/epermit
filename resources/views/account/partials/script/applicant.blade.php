<script type="text/javascript">
	(function($){
		'use strict';

		$(document).ready(function(){

			$('#applicationModal').modal('show');

			$('.hikingdate').datetimepicker({
				i18n:{
					de:{
						months:[
						'Januar','Februar','MÃ¤rz','April',
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
				minDate:'{{ date('Y/m/d', strtotime('+14 day')) }}',//yesterday is minimum date(for today use 0 or -1970/01/01)
 				// maxDate:'+1970/01/02', //tomorrow is maximum date calendar
 				startDate: '{{ date('Y/m/d', strtotime('+15 day')) }}',
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});

			$('body').on('change', '#state', function(){
				// alert('x');
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-area') }}',
					data: {
						id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						console.log(data);
						$('#area').html(data).selectpicker('refresh');
					}
				});
			});

			$('body').on('change', '#area', function(){

				var stateId = $('#state').val();
				var areaId = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-mountain') }}',
					data: {
						state_id: stateId,
						area_id: areaId,
						// forest_id: forest_id,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#mountain').html(data.mountain).selectpicker('refresh');;
						$('#type').select2('destroy').empty().select2({data: data.convenience});
						// console.log(data);
						// $('#mountain').select2('destroy').empty().select2({data: data.mountain});
						// $('#convenience').select2('destroy').empty().select2({data: data.convenience});
					}
				});

				// $.ajax({
				// 	type: 'POST',
				// 	url: '{{ url('account/member-aktiviti-pendakian/find-hsk') }}',
				// 	data: {
				// 		state_id: stateId,
				// 		area_id: areaId,
				// 		_token: '{{ csrf_token() }}'
				// 	},
				// 	success: function(data)
				// 	{
				// 		$('#permanent_forest').select2('destroy').empty().select2({data: data.hsk});
				// 		$('#type').select2('destroy').empty().select2({data: data.convenience_type});
				// 		console.log(data);
				// 		// $('#mountain').select2('destroy').empty().select2({data: data.mountain});
				// 		// $('#convenience').select2('destroy').empty().select2({data: data.convenience});
				// 	}
				// });
			});

			$('body').on('change', '#type', function(){

				var state_id = $('#state').val();
				var area_id = $('#area').val()
				var type = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-eco-park') }}',
					data: {
						state_id: state_id,
						area_id: area_id,
						type: type,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#eco_park').select2('destroy').empty().select2({data: data});
						// $('#mountain').select2('destroy').empty().select2({data: data.mountain});
						// $('#convenience').select2('destroy').empty().select2({data: data.convenience});
					}
				});
			});

			$('body').on('change', '#permanent_forest', function(){

				var stateId = $('#state').val();
				var areaId = $('#area').val();
				var forest_id = $(this).val();

				// $.ajax({
				// 	type: 'POST',
				// 	url: '{{ url('account/member-aktiviti-pendakian/find-mountain') }}',
				// 	data: {
				// 		state_id: stateId,
				// 		area_id: areaId,
				// 		forest_id: forest_id,
				// 		_token: '{{ csrf_token() }}'
				// 	},
				// 	success: function(data)
				// 	{
				// 		$('#mountain').select2('destroy').empty().select2({data: data});
				// 		// console.log(data);
				// 		// $('#mountain').select2('destroy').empty().select2({data: data.mountain});
				// 		// $('#convenience').select2('destroy').empty().select2({data: data.convenience});
				// 	}
				// });
			});

			$('body').on('change', '#mountain', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-amount-mountain') }}',
					data: {
						id: $(this).val(),
						starting_date: $('#starting_date').val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						// $('#campgroundDetail').show();
						// $('#campgroundDetailData').html(data.campground);
						$('#amount').val($.number(data.amount, 2));
						$('.select2').select2();
						console.log(data);
					}
				});
			});

			$('body').on('change', '#starting_date', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-ending-date') }}',
					data: {
						mountain_id: $('#mountain').val(),
						starting_date: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#ending_date').val(data.ending_date);
						$('#day').val(data.day);
						// $('#participant').select2('destroy').empty().select2({data: data.slots});
						$('#campgroundDetail').show();
						$('#campgroundDetailData').html(data.campground);
						$('.select2').select2();
						$('#participant').prop('disabled', false);
						$('#available_slot').html('Had peserta berbaki' + data.slot_count + ' sahaja');
						$('#available_slot_hidden').val(data.slot_count);
					}
				});
			});

			$('#participant').on('change', function(){
				var slot = $('#available_slot_hidden').val();

				if(parseInt($(this).val()) > parseInt(slot))
				{
					alert('Jumlah peserta sepatutnya kurang daripada ' + slot);
					$(this).focus();
					$(this).val('');
				}
			});

			$('body').on('change', '#participant', function(){

				var mountainId = $('#mountain').val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-amount') }}',
					data: {
						mountain_id: mountainId,
						participant: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#amount').val($.number(data, 2));
					}
				});
			});

			$('body').on('change', '#convenience', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-amount-convenience') }}',
					data: {
						id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#convenience_price').val(data);
						$('#convenience_amount').val(data);
					}
				});
			});

			// $('body').on('change', '.campground', function(){
			// 	// var count = $(".campground option:selected").length;
			// 	// alert(count);
			// 	var i = 0;
			// 	var key = [];
			// 	$('.campground').each(function(){

			// 		var data = $(this).find('option:selected').val();
			// 		var id   = $(this).find('option:selected').data('id');
					
			// 		if(data != '')
			// 		{
			// 			i++;

			// 			key.push(id);
			// 		}
			// 	});

			// 	if(i === 2)
			// 	{
			// 		$('.campground').prop('disabled', true);

			// 		for(var k = 0; k < key.length; k++)
			// 		{
			// 			$('#campground-' + key[k]).prop('disabled', false);
			// 		}
			// 	}

			// 	// for(var k = 0; k < key.length; k++)
			// 	// {
			// 	// 	if(i == 2)
			// 	// 	{
			// 	// 		$('.campground').prop('disabled', true);
			// 	// 		$('#campground-' + key[k]).prop('disabled', false);
			// 	// 	}
			// 	// }

			// });

			$('body').on('change', '#convenience_day', function(){
				var price = $('#convenience_price').val();
				var value = $(this).val();

				$('#convenience_amount').val((price*value));

			});

			$('body').on('click', '#add_convenience', function(){
				var convenience_id   = $('#convenience').val();
				var convenience_text = $('#convenience option:selected').text();
				var price            = $('#convenience_amount').val();
				var day              = $('#convenience_day').val();
				var participant      = $('#convenience_participant').val();
				var html             = '';

				var table_data = (($('.convenience_table_data').length) + 1);

				html += '<tr class="convenience_table_data" id="ctd'+ convenience_id +'">';
				html += '	<td>'+ table_data;
				html += '	<input type="hidden" name="convenience_table['+ convenience_id +'][price]" value="'+ price +'">';
				html += '	<input type="hidden" name="convenience_table['+ convenience_id +'][day]" value="'+ day +'">';
				html += '	<input type="hidden" name="convenience_table['+ convenience_id +'][participant]" value="'+ participant +'">';
				html += '	</td>';
				html += '	<td>'+ convenience_text +'</td>';
				html += '   <td>'+ participant +'</td>';
				html += '	<td>'+ day +'</td>';
				html += '	<td>'+ price +'</td>';
				html += '	<td><a href="javascript:void(0)" data-id="'+ convenience_id +'" class="convenience_delete">Delete</a></td>';
				html += '</tr>';
				
				$(html).appendTo('#data-conveniece');
				$('#convenience').val('').trigger('change');
				$('#convenience_price').val('');
				$('#convenience_amount').val('');
				$('#convenience_participant').val('');
				$('#convenience_day').val('');
			});
			$('body').on('click', '.convenience_delete', function(){
				var id = $(this).data('id');

				$('#ctd' + id).remove();
			});

			$('body').on('change', '#hiker_fullname', function(){
				$('#declaration_name').val($(this).val());
			});

			$('body').on('change', '#hiker_ic', function(){
				$('#declaration_ic').val($(this).val());
			});

			$('body').on('click', '#hiker_nationality', function(){
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

			$('body').on('change', '#hiker_ic', function(){
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
					console.log(birthday);

					var theDate = new Date(birthday);
					if (Object.prototype.toString.call(theDate) === "[object Date]") {
					  	// it is a date
					  	if (isNaN(theDate.getTime())) {  // d.valueOf() could also work
					    	$('#hiker_birthday').val('');
					  	} else {

					    	$('#hiker_birthday').val(birthday);

							if(isNaN(age))
							{
								$('#hiker_age').val('');
							}
							else
							{
								$('#hiker_age').val(age);
							}
					  	}
					} else {
					  	$('#hiker_birthday').val('');
					}

					
				}
			});

			$('body').on('change', '#eco_park', function(){
				var state_id = $('#state').val();
				var area_id  = $('#area').val();
				var type = $('#type').val();
				var eco_park_id = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-convenience') }}',
					data: {
						state_id: state_id,
						area_id: area_id,
						type: type,
						eco_park_id: eco_park_id,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#convenience_category').select2('destroy').empty().select2({data: data});
					}
				});
			});

			$('body').on('change', '#convenience_category', function(){

				var type = $(this).val();
				$('#price_convenience').val('');
				$('#amount_convenience').val('');
				$('#category').val('').trigger('change');
				$('#children').val('');
				$('#student').val('');
				$('#adult').val('');
				$('#unit').val('');
				
				if(type == '2' || type == '3')
				{
					
					$('#peopledetail').show();
					$('#people').show();
					$('#pricing').show();
					$('#unitdetail').hide();
					$('#unitdata').hide();
				}
				else
				{
					$('#peopledetail').hide();
					$('#people').hide();
					$('#pricing').show();
					$('#unitdetail').show();
					$('#unitdata').show();
				}

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-convenience-sub-category') }}',
					data: {
						state_id: $('#state').val(),
						area_id: $('#area').val(),
						ecopark_id: $('#eco_park').val(),
						convenience_category_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						if(data.id == '2' || data.id == '3')
						{
							$('#price_convenience').val(data.price);
							$('#amount_convenience').val(data.price);
						}
						else
						{
							$('#category').select2('destroy').empty().select2({data: data.data});
						}
					}
				});
			});
			$('body').on('change', '#category', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-pendakian/find-price-type') }}',
					data: {
						state_id: $('#state').val(),
						area_id: $('#area').val(),
						ecopark_id: $('#eco_park').val(),
						convenience_category_id: $('#convenience_category').val(),
						convenience_sub_category_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{

						$('#price_convenience').val(data.price);
						$('#amount_convenience').val(data.price);
					}
				});
			});
			$('body').on('change', '#unit', function(){
				var price = $('#price_convenience').val();
				var amount = 0;

				amount = (parseInt($(this).val()) * parseInt(price));

				$('#amount_convenience').val(amount);
			});

			$('body').on('change', '#children', function(){
				var children = $(this).val();
				var student = ($('#student').val() != '' ? $('#student').val() : 0);
				var adult = ($('#adult').val() != '' ? $('#adult').val() : 0);
				var price = $('#price_convenience').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount_convenience').val((total*price));
			});
			$('body').on('change', '#student', function(){
				var children = ($('#children').val() != '' ? $('#children').val() : 0);
				var student = $(this).val();
				var adult = ($('#adult').val() != '' ? $('#adult').val() : 0);
				var price = $('#price_convenience').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount_convenience').val((total*price));
			});
			$('body').on('change', '#adult', function(){
				var children = ($('#children').val() != '' ? $('#children').val() : 0);
				var student = ($('#student').val() != '' ? $('#student').val() : 0);
				var adult = $(this).val();
				var price = $('#price_convenience').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount_convenience').val((total*price));
			});

			$('body').on('change', '#checkName', function(){
				if($(this).is(':checked'))
				{
					@if(auth()->guard('applicant')->user()->profile->citizen == 1)
						$('#hiker_nationality').prop('checked', true);
					@else
						$('#non_hiker_nationality').prop('checked', true);
					@endif
					$('#hiker_state').val('{{ auth()->guard('applicant')->user()->profile->state }}').change();
					$('#hiker_fullname').attr('readonly', 'readonly');
					$('#hiker_fullname').val('{{ auth()->guard('applicant')->user()->name }}');
					$('#declaration_name').val('{{ auth()->guard('applicant')->user()->name }}');
					$('#declaration_ic').val('{{ (!empty(auth()->guard('applicant')->user()->profile->nokp) ? auth()->guard('applicant')->user()->profile->nokp : '') }}');
					var kp = '{{ (!empty(auth()->guard('applicant')->user()->profile->nokp) ? auth()->guard('applicant')->user()->profile->nokp : '') }}';
					if(kp != '')
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
						$('#hiker_ic').val(kp);
						$('#hiker_birthday').val(birthday);
						$('#hiker_age').val(age);
					}

					@if(!empty(auth()->guard('applicant')->user()->profile->phone))
						$('#hiker_phone').val('{{ auth()->guard('applicant')->user()->profile->phonecode . auth()->guard('applicant')->user()->profile->phone }}');
					@endif

					@if(!empty(auth()->guard('applicant')->user()->profile->address_1))
					
						$('#hiker_address').val("{{ trim(preg_replace('/\s\s+/', ' ', auth()->guard('applicant')->user()->profile->address_1)) }}");
					@endif

					@if(!empty(auth()->guard('applicant')->user()->profile->postcode))
					
						$('#hiker_postcode').val('{{ auth()->guard('applicant')->user()->profile->postcode }}');
					@endif

					@if(!empty(auth()->guard('applicant')->user()->profile->state))
					
						$('#hiker_state').val('{{ auth()->guard('applicant')->user()->profile->state }}').trigger('change');
					@endif

					@if(!empty(auth()->guard('applicant')->user()->profile->country))
						$('#hiker_country').val('{{ auth()->guard('applicant')->user()->profile->country }}').trigger('change');
					@endif

					$('#hiker_gender').val('M').trigger('change');

					

				}
				else
				{
					$('#hiker_fullname').prop('readonly', false);
					$('#hiker_fullname').val('');
					$('#hiker_fullname').val('');
					$('#hiker_ic').val('');
					$('#hiker_birthday').val('');
					$('#hiker_age').val('');
					$('#hiker_phone').val('');
					$('#hiker_address').val('');
					$('#hiker_postcode').val('');
					$('#hiker_state').val('').trigger('change');
					$('#hiker_country').val('').trigger('change');
					$('#hiker_nationality').prop('checked', false);
					$('#non_hiker_nationality').prop('checked', false);
					$('#hiker_state').val('').change();
					$('#declaration_name').val('');
					$('#declaration_ic').val('');
				}
			});
			$('#checkAddress').on('click', function(){
				if($(this).is(':checked'))
				{
					$('#emergency_address').val('{{ trim(preg_replace('/\s\s+/', ' ', auth()->guard('applicant')->user()->profile->address_1)) }}');
				}
				else
				{
					$('#emergency_address').val('');
				}
			});

			$('#hiker_country').on('change', function(){
				if($(this).val() == 130)
				{
					$('#hiker_postcode').attr('type', 'number');
				}
				else
				{
					$('#hiker_postcode').attr('type', 'text');
				}
			});
			$('#country').on('change', function(){
				if($(this).val() == 130)
				{
					$('#emergency_postcode').attr('type', 'number');
				}
				else
				{
					$('#emergency_postcode').attr('type', 'text');
				}
			});
		});

		

	})(jQuery);
	document.querySelector(".control-phone").addEventListener("keypress", function (evt) {
	    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
	    {
	        evt.preventDefault();
	    }
	});
	document.querySelector(".control-phone-emergency").addEventListener("keypress", function (evt) {
	    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
	    {
	        evt.preventDefault();
	    }
	});
</script>