$(function(){
	//hide placeholder
	$('[placeholder]').focus(function(){
		$(this).attr('data-text',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder',$(this).attr('data-text'));
	});

	//* required
	$('input').each(function(){
		if($(this).attr('required')==='required'){
			$(this).after("<span class='required'>*</span>");
		}
	});

	//convert password to text
	$('.show-pass').hover(function(){
		$('.password').attr('type','text');
	},function(){
		$('.password').attr('type','password');
	});

	//confirm delete message
	$('.confirm').click(function(){
		return confirm('are you sure ?');
	});


	//sidebar

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  	});

});