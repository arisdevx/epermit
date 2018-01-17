<script type="text/javascript">
	(function($){
		'use strict';

		$(document).ready(function(){

			$('.otherStartingDate').datetimepicker({
				format:'Y/m/d',
				// onShow:function( ct ){
				// 	this.setOptions({
				// 		maxDate:$('.otherEndingDate').val()?$('.otherEndingDate').val():false
				// 	})
				// },
				minDate:'{{ date('Y/m/d', strtotime('+1 month')) }}',
				startDate: '{{ date('Y/m/d', strtotime('+1 month')) }}',
				timepicker:false,
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});
			$('.otherEndingDate').datetimepicker({
				format:'Y/m/d',
				// onShow:function( ct ){
				// 	var start = $('.otherEndingDate').val().split('/');
				// 	var startingDate = start[2] + '/' + (parseInt(start[1]) + 1) + '/' + start[0];
				// 	this.setOptions({
				// 		minDate: startingDate
				// 	})
				// },
				minDate:'{{ date('Y/m/d', strtotime('+1 month')) }}',
				startDate: '{{ date('Y/m/d', strtotime('+1 month')) }}',
				timepicker:false,
				format:'d/m/Y',
				scrollMonth:false,
				scrollTime:false,
				scrollInput:false,
				scrollInput : false
			});

			$('body').on('change', '#state', function(){
				// $.ajax({
				// 	type: 'POST',
				// 	url: '{{ url('account/member-aktiviti-lain/find-eco-park') }}',
				// 	data: {
				// 		state_id: $(this).val(),
				// 		_token: '{{ csrf_token() }}'
				// 	},
				// 	success: function(data)
				// 	{
				// 		$('#ecopark').select2('destroy').empty().select2({data: data});
				// 	}
				// });
				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-lain/find-area') }}',
					data: {
						id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#area').select2('destroy').empty().select2({data: data});
					}
				});
			});

			$('body').on('change', '#place', function(){

				var category = $('#category').val();

				if(category == 'hsk')
				{
					$.ajax({
						type: 'POST',
						url: '{{ url('account/member-aktiviti-lain/find-activity-price') }}',
						data: {
							id: $(this).val(),
							_token: '{{ csrf_token() }}'
						},
						success: function(data)
						{
							$('#price').val(data);
							$('#amount').val(data);
						}
					});
				}

				
			});

			$('body').on('change', '#area', function(){

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-lain/find-activity') }}',
					data: {
						state_id: $('#state').val(),
						area_id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#activity').select2('destroy').empty().select2({data: data});
					}
				});

			});

			// $('body').on('change', '#activity', function(){
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: '{{ url('account/member-aktiviti-lain/find-activity-price') }}',
			// 		data: {
			// 			id: $(this).val(),
			// 			_token: '{{ csrf_token() }}'
			// 		},
			// 		success: function(data)
			// 		{
			// 			$('#price').val(data);
			// 			$('#amount').val(data);
			// 		}
			// 	});
			// });

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

				// $.ajax({
				// 	type: 'POST',
				// 	url: '{{ url('account/member-aktiviti-lain/find-capacity') }}',
				// 	data: {
				// 		category: $('#category').val(),
				// 		place: $('#place').val(),
				// 		starting_date: $('#starting_date').val(),
				// 		_token: '{{ csrf_token() }}'
				// 	},
				// 	success: function(data)
				// 	{
				// 		$('#participant').select2('destroy').empty().select2({data: data});
				// 		// console.log(data);
				// 	}
				// });

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

					$('#day').val(diff);
				}

			});

			$('body').on('change', '#category', function(){
				var type = $(this).val();
				$('#location').val('');
				$('#price').val('0');
				$('#amount').val('0');
				if(type === 'hsk')
				{
					$('#location').prop('disabled', false);
				}
				else
				{
					$('#location').prop('disabled', true);
				}

				$.ajax({
					type: 'POST',
					url: '{{ url('account/member-aktiviti-lain/find-place') }}',
					data: {
						type: $(this).val(),
						state_id: $('#state').val(),
						area_id: $('#area').val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#place').select2('destroy').empty().select2({data: data});
					}
				});
			});

			$('body').on('change', '#participant', function(){
				var price = parseInt($('#price').val());
				var participant = parseInt($(this).val());
				$('#amount').val($.number(price*participant, 2));
			});

			// $('body').on('change', '#name', function(){
			// 	$('#declaration_name').val($(this).val());
			// });

			$('body').on('click', '#print', function(){
				$('#printArea').printThis();
			});
		});

	})(jQuery);
</script>