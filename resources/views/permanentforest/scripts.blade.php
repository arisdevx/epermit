{{-- <script type="text/javascript">
	(function($){
		'use strict';

		$(document).ready(function(){
			$('#state').on('change', function(){
				$.ajax({
					type: 'POST',
					url: '{{ url('permanent-forest/find-area') }}',
					data: {
						id: $(this).val(),
						_token: '{{ csrf_token() }}'
					},
					success: function(data)
					{
						$('#area').html(data);
					}
				});
			});
		});

	})(jQuery);
</script> --}}