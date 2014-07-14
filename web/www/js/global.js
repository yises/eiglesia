$(document).ready(function(){
	$('.login').click(function(){
		$('.login_form').add('.mask').fadeIn();
	});
	$('.mask').click(function(){
		$('.feedback_popup').add('.login_form').add('.mask').fadeOut();
	});
});