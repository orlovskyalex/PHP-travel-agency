$(document).ready(function () {
	togglePopups();
});

function togglePopups() {
	var signinBtn = $('#signin-btn'),
		signinPopup = $('#signin-popup'),
		signupBtn = $('#signup-btn'),
		signupPopup = $('#signup-popup'),
		popups = $('.popup');

	signinBtn.click(function (e) {
		e.stopImmediatePropagation();
		popups.not(signinPopup).removeClass('active');
		signinPopup.toggleClass('active');
	});

	signupBtn.click(function (e) {
		e.stopImmediatePropagation();
		popups.not(signupPopup).removeClass('active');
		signupPopup.toggleClass('active');
	});

	$('*').click(function () {
		popups.removeClass('active');
	});
}