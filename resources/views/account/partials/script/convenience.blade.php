<script type="text/javascript">
	(function($){
		'use strict';

		$(document).ready(function(){

			$('.otherStartingDate').datetimepicker({
				format:'Y/m/d',
				minDate:'{{ date('Y/m/d', strtotime('+1 day')) }}',
				startDate: '{{ date('Y/m/d', strtotime('+1 day')) }}',
				timepicker:false,
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});
			$('.otherEndingDate').datetimepicker({
				format:'Y/m/d',
				minDate:'{{ date('Y/m/d', strtotime('+2 day')) }}',
				startDate: '{{ date('Y/m/d', strtotime('+2 day')) }}',
				timepicker:false,
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});
			$('body').on('change', '#starting_date', function(){

				var ending_date = $('#ending_date').val();
				var starting_date = $(this).val().split('/');

				if(ending_date !== '')
				{
					var end_date = ending_date.split('/');

					var start = new Date(starting_date[2] + '-' + starting_date[1] + '-' + starting_date[0]);
					var end = new Date(end_date[2] + '-' + end_date[1] + '-' + end_date[0]);
					var diff = Math.round((end- start)/(1000*60*60*24));

					$('#day').val(diff);
				}

			});

			$('body').on('change', '#ending_date', function(){

				var ending_date = $(this).val().split('/');
				var starting_date = $('#starting_date').val();

				if(starting_date !== '')
				{
					var starting_date = starting_date.split('/');

					var start = new Date(starting_date[2] + '-' + starting_date[1] + '-' + starting_date[0]);
					var end = new Date(ending_date[2] + '-' + ending_date[1] + '-' + ending_date[0]);
					var diff = Math.round((end- start)/(1000*60*60*24));

					$('#day').val((diff+1));
				}

			});

			$('body').on('change', '#state', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/find-area') }}',
					data: {
						state_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#area').html(data).selectpicker('refresh');
					}
				});
				// $.ajax({
				// 	type: 'POST',
				// 	url: '{{ url('account/member-tempahan-kemudahan/find-eco-park') }}',
				// 	data: {
				// 		state_id: $(this).val(),
				// 		_token: '{{ csrf_token() }}'
				// 	},
				// 	success: function(data)
				// 	{
				// 		$('#ecopark').select2('destroy').empty().select2({data: data});
				// 	}
				// });
			});

			$('body').on('change', '#type', function(){

				var state_id = $('#state').val();
				var area_id  = $('#area').val();
				var type     = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/find-eco-park') }}',
					data: {
						state_id: state_id,
						area_id: area_id,
						type: type,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{

						$('#eco_park').html(data).selectpicker('refresh');
					}
				});
			});

			$('body').on('change', '#convenience_category', function(){

				var type = $(this).val();
				$('#price').val('');
				$('#amount').val('');
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
					url: '{{ url('account/member-tempahan-kemudahan/find-convenience-sub-category') }}',
					data: {
						state_id: $('#state').val(),
						area_id: $('#area').val(),
						ecopark_id: $('#eco_park').val(),
						convenience_category_id: $(this).val(),
						category: $('#category').val(),
						starting_date: $('#starting_date').val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						if(data.id == '2' || data.id == '3')
						{
							$('#price').val($.number(data.price, 2));
							$('#amount').val($.number(data.price, 2));
							$('#children').html(data.slots).selectpicker('refresh');
							$('#student').html(data.slots).selectpicker('refresh');
							$('#adult').html(data.slots).selectpicker('refresh');
						}
						else
						{
							$('#category').html(data.data).selectpicker('refresh');
						}
						// if(data.error === 'false')
						// {
						// 	$('#pricetype').val(null).trigger('change');
						// 	$('#conveniencesubcategory').prop('disabled', false);
						// 	$('#conveniencesubcategory').select2('destroy').empty().select2({data: data.data});
						// }
						// else
						// {
						// 	$('#conveniencesubcategory').val(null).trigger('change');
						// 	$('#conveniencesubcategory').prop('disabled', true);
						// 	$('#conveniencesubcategory').select2('destroy').empty().select2({data: data.data});
						// 	$('#pricetype').select2('destroy').empty().select2({data: $.number(data.price, 2)});

						// 	$('#measurement').html(data.measurement);
						// }
					}
				});

				
			});

			$('body').on('change', '#category', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/find-price-type') }}',
					data: {
						state_id: $('#state').val(),
						area_id: $('#area').val(),
						ecopark_id: $('#eco_park').val(),
						convenience_category_id: $('#convenience_category').val(),
						convenience_sub_category_id: $(this).val(),
						starting_date: $('#starting_date').val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{

						$('#price').val($.number(data.price, 2));
						$('#amount').val($.number(data.price, 2));
						$('#unit').html(data.slots).selectpicker('refresh');
					}
				});
			});

			$('body').on('change', '#conveniencesubcategory', function(){

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/find-price-type') }}',
					data: {
						state_id: $('#state').val(),
						ecopark_id: $('#ecopark').val(),
						convenience_category_id: $('#conveniencecategory').val(),
						convenience_sub_category_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{

						$('#pricetype').select2('destroy').empty().select2({data: data.data});
						$('#measurement').html(data.capacity);
					}
				});
			});

			$('body').on('change', '#pricetype', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/find-price') }}',
					data: {
						state_id: $('#state').val(),
						ecopark_id: $('#ecopark').val(),
						convenience_category_id: $('#conveniencecategory').val(),
						convenience_sub_category_id: $('#conveniencesubcategory').val(),
						price_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#price').val(data);
						$('#amount').val(data);
					}
				});
			});

			$('body').on('change', '#participant', function(){
				var price = $('#price').val();

				$('#amount').val(($(this).val()*price));
			});

			$('body').on('click', '#add_convenience', function(){
				var number = ($('.convenience_data_table').length+1);
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/set-convenience') }}',
					data: {
						state_id: $('#state').val(),
						ecopark_id: $('#ecopark').val(),
						convenience_category_id: $('#conveniencecategory').val(),
						convenience_sub_category_id: $('#conveniencesubcategory').val(),
						price_category_id: $('#pricetype').val(),
						starting_date: $('#starting_date').val(),
						ending_date: $('#ending_date').val(),
						participant: $('#participant').val(),
						measurement: $('#measurement_total').val(),
						amount: $('#amount').val(),
						number: number,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$(data).appendTo('#data-convenience');
					}
				});
				
			});

			$('body').on('click', '.delete', function(){
				$('#cdt'+ $(this).data('id')).remove();
			});

			$('body').on('change', '#starting_date', function(){

				var starting_date = $(this).val();
				var ending_date = $('#ending_date').val();
				var start = starting_date.split('/');
				var end   = ending_date.split('/');
				var price = $('#price').val();

				if(ending_date !== '')
				{
					var start = new Date(start[2] + '-' + start[1] + '-' + start[0]);
					var end = new Date(end[2] + '-' + end[1] + '-' + end[0]);
					var diff = Math.round((end- start)/(1000*60*60*24));

					// $('#day').val(diff);
					// $('#price').val((diff*price));

				}
			});

			$('body').on('change', '#ending_date', function(){

				var starting_date = $('#starting_date').val();
				var ending_date = $(this).val();
				var start = starting_date.split('/');
				var end   = ending_date.split('/');
				var price = $('#price').val();

				if(starting_date !== '')
				{
					var start = new Date(start[2] + '-' + start[1] + '-' + start[0]);
					var end = new Date(end[2] + '-' + end[1] + '-' + end[0]);
					var diff = Math.round((end- start)/(1000*60*60*24));

					// $('#day').val(diff);
					// $('#price').val((diff*price));

				}
			});

			$('body').on('change', '#unit', function(){
				var price = $('#price').val();
				var amount = 0;

				amount = (parseInt($(this).val()) * parseInt(price));

				$('#amount').val($.number(amount, 2));
			});

			$('body').on('change', '#children', function(){
				var children = $(this).val();
				var student = ($('#student').val() != '' ? $('#student').val() : 0);
				var adult = ($('#adult').val() != '' ? $('#adult').val() : 0);
				var price = $('#price').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount').val($.number((total*price), 2));
			});
			$('body').on('change', '#student', function(){
				var children = ($('#children').val() != '' ? $('#children').val() : 0);
				var student = $(this).val();
				var adult = ($('#adult').val() != '' ? $('#adult').val() : 0);
				var price = $('#price').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount').val($.number((total*price), 2));
			});
			$('body').on('change', '#adult', function(){
				var children = ($('#children').val() != '' ? $('#children').val() : 0);
				var student = ($('#student').val() != '' ? $('#student').val() : 0);
				var adult = $(this).val();
				var price = $('#price').val();
				var total = (parseInt(children)+parseInt(student)+parseInt(adult));

				$('#amount').val($.number((total*price), 2));
			});

			$('body').on('change', '#area', function(){
				var state_id = $('#state').val();
				var area_id  = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/get-convenience-category') }}',
					data: {
						state_id: state_id,
						area_id: area_id,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#type').html(data).selectpicker('refresh');
					}
				});
			});
			$('body').on('change', '#eco_park', function(){
				var state_id = $('#state').val();
				var area_id  = $('#area').val();
				var type = $('#type').val();
				var eco_park_id = $(this).val();

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/get-convenience') }}',
					data: {
						state_id: state_id,
						area_id: area_id,
						type: type,
						eco_park_id: eco_park_id,
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#convenience_category').html(data).selectpicker('refresh');
					}
				});
			});

			// Tempahan kemudahan baru
			$('body').on('click', '#addToTable', function(){

				var count = $('.row-table').length;

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/ajax-store') }}',
					data: {
						_token: '{{ csrf_token() }}',
						state: $('#state').val(),
						area: $('#area').val(),
						type: $('#type').val(),
						eco_park: $('#eco_park').val(),
						starting_date: $('#starting_date').val(),
						ending_date: $('#ending_date').val(),
						day: $('#day').val(),
						convenience_category: $('#convenience_category').val(),
						children: $('#children').val(),
						student: $('#student').val(),
						adult: $('#adult').val(),
						unit: $('#unit').val(),
						category: $('#category').val(),
						nationality: $('#nationality').val(),
						amount: $('#amount').val(),
					},
					success: function(data)
					{
						var convenience_ids = [];
						var conveniece_id = $('#convenience_ids').val();
						convenience_ids = conveniece_id.split(',');

						if(conveniece_id == '')
						{
							console.log('check');
							$('#convenience_ids').val(data.id)
						}
						else
						{
							console.log('check 2');
							convenience_ids.push(data.id);
							$('#convenience_ids').val(convenience_ids.join(','));
						}


						$('#convenienceEmpty').hide();
						console.log(count);
						var html = "<tr id='tableId-"+ data.id +"' class='row-table'>\
										<td>"+ (count + 1) +"</td>\
										<td>"+ data.starting_date +"</td>\
										<td>"+ data.ending_date +"</td>\
										<td>"+ data.day +" Hari</td>\
										<td>"+ data.convenience +"</td>\
										<td>"+ data.category +"</td>\
										<td>"+ data.unit +"</td>\
										<td>"+ data.amount +"</td>\
										<td class='text-center'>\
											<div class='btn-group btn-group-sm' role='group' aria-label='...'>\
												<a href='javascript:void(0)' class='btn btn-danger deleteFromTable' data-id='"+ data.id +"'><span class='fa fa-close'></span></a>\
											</div>\
										</td>\
									</tr>";
									/*

												<a href='javascript:void(0)' class='btn btn-default'><span class='fa fa-edit'></span></a>\
									*/
						$(html).appendTo('#convenienceTableData');
						// $('#state').val('').trigger('change');
						// $('#area').val('').trigger('change');
						// $('#type').val('').trigger('change');
						// $('#eco_park').val('').trigger('change');
						// $('#starting_date').val('');
						// $('#ending_date').val('');
						// $('#day').val('');
						$('#convenience_category').val('default');
						$('#convenience_category').selectpicker('refresh');
						$('#children').val('').trigger('change');
						$('#student').val('').trigger('change');
						$('#adult').val('').trigger('change');
						$('#unit').val('');
						$('#category').val('').trigger('change');
						$('#nationality').val('').trigger('change');
						$('#amount').val('');
						$('#peopledetail').hide();
						$('#people').hide();
						$('#pricing').hide();
						$('#unitdetail').hide();
						$('#unitdata').hide();
						$('#peopledetail').hide();
						$('#people').hide();
						$('#pricing').hide();
						$('#unitdetail').hide();
						$('#unitdata').hide();
					}
				});
			});

			$('body').on('click', '.deleteFromTable', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-tempahan-kemudahan/delete-from-table') }}',
					data: {
						_token: '{{ csrf_token() }}',
						id: $(this).data('id')
					},
					success: function(data){
						$('#tableId-' + data).remove();
						var convenience_ids = [];
						var conveniece_id = $('#convenience_ids').val();
						convenience_ids = conveniece_id.split(',');

						convenience_ids = $.grep(convenience_ids, function(value){
							return value != data;
						});

						$('#convenience_ids').val(convenience_ids);

						if(convenience_ids.length == 0)
						{
							$('#convenienceEmpty').show();
						}
					}
				});
			});
		});

	})(jQuery);
</script>