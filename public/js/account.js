$(function(){
	$('.form-create-new').on('click', '.btn-form-create-new', function(event) {
		event.preventDefault();
		/* Act on the event */
		var email = $('.form-create-new input[name="email"]').val();
		var password = $('.form-create-new input[name="password"]').val();
		var url = $('.form-create-new form').attr('data-url');
		console.log(email, password, url);
		$.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: url,
          type: 'post',
          data: {
            "email" : email,
            "password" : password
          },
          dataType: 'json',
          success:function (result) {
            console.log(result);
            $('.list-account').prepend(result.view);
          }
        });
        $('.form-create-new').css('display', 'none');
	});

	$('.open-form').click(function(){
		$('.form-create-new').css('display', 'block');
	});
	$('.close-form').click(function(){
		$('.form-create-new').css('display', 'none');
	});
	$('.card').on('click', '.cancel-update', function(event) {
		console.log($(this).closest('form'));
		$(this).closest('form').remove();
	});
	$('.card').on('click', '.edit', function(event) {
		var url = $(this).attr('data-url');
		var id = $(this).attr('data-id');
		event.preventDefault();
		/* Act on the event */
		$.ajax({
          url: url,
          type: 'get',
          success:function (result) {
            console.log(result);
            $('#card-'+id).append(result.view);
          }
        });
	});
	$('.card').on('click', '.cancel-update', function(event) {
        $('.form-edit').remove();
	});
	$('.card').on('click', '.update', function(event) {
		var url = $(this).attr('data-url');
		var id = $(this).attr('data-id');
		var email = $('#card-'+id+ ' input[name="email"]').val();
		var password = $('#card-'+id+ ' input[name="password"]').val();
		console.log(email, password, url);
		$.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: url,
          type: 'post',
          data: {
            "email" : email,
            "password" : password
          },
          dataType: 'json',
          success:function (result) {
            console.log(result);
            $('#card-'+id+ ' .email').html(result.email);
            $('#card-'+id+ ' .password').html(result.password);
            $('.form-edit').remove();
          }
        });
	});
	$('.card').on('click', '.delete', function(event) {
		var result = confirm("Want to delete?");
		if (result) {
			var id = $(this).attr('data-id');
			var url = $(this).attr('data-url');
		    $.ajaxSetup({
	            headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        $.ajax({
	          url: url,
	          type: 'delete',
	          success:function (result) {
	            $('#card-'+id).remove();
	          }
	        });
		}
	});
})