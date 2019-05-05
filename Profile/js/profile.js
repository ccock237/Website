$(document).ready(function() {
	var clicked = false;
	$("#email").click(function() {
		clicked = true;
	});
	
	$(window).focus(function() {
		window_focus = true;
	}).blur(function() {
		window_focus = false;
		if (clicked) {
			alert("If the email button is not working, check your default Mail app.");
			clicked = false;
		}
	});
});