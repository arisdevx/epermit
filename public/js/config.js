(function($){
	'use strict';

	$(document).ready(function(){
		$('#loginFailed').modal('show');
		$('.select2').select2();
		$('.texteditor').summernote({
			height: 200,
	        tabsize: 1,
	        toolbar: [
			    // [groupName, [list of button]]
			    ['style', ['bold', 'italic', 'underline', 'clear']],
			    ['font', ['strikethrough', 'superscript', 'subscript']],
			    ['fontsize', ['fontsize']],
			    ['color', ['color']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['height', ['height']]
			]
		});

		$('.datefrom').datetimepicker({
			format:'Y/m/d',
			onShow:function( ct ){
				this.setOptions({
					maxDate:$('.dateuntil').val()?$('.dateuntil').val():false
				})
			},
			timepicker:false,
			format:'d/m/Y'
		});
		$('.dateuntil').datetimepicker({
			format:'Y/m/d',
			onShow:function( ct ){
				this.setOptions({
					minDate:$('.datefrom').val()?$('.datefrom').val():false
				})
			},
			timepicker:false,
			format:'d/m/Y'
		});
	});
})(jQuery);

