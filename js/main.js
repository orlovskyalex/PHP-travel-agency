$(document).ready(function () {
	togglePopups();
	forms();
});

function togglePopups() {
	var signinBtn = $('#signin-btn'),
		signinPopup = $('#signin-popup'),
		signinSuccess = $('#signin-success'),
		signupBtn = $('#signup-btn'),
		signupPopup = $('#signup-popup'),
		popups = $('.popup');

	signinBtn.click(function (e) {
		e.stopPropagation();
		popups.not(signinPopup).removeClass('active');
		signinPopup.toggleClass('active');
	});

	signupBtn.click(function (e) {
		e.stopPropagation();
		popups.not(signupPopup).removeClass('active');
		signupPopup.toggleClass('active');
	});

	popups.click(function (e) {
		e.stopPropagation();
	});

	signinSuccess.find('button').click(function () {
		window.location.reload();
	});

	popups.filter('.notification').find('button').click(function (e) {
		e.preventDefault();
		$(this).closest('.popup').removeClass('active');
	});

	$('body').click(function () {
		popups.removeClass('active');
	});
}

function forms() {
	var signinForm = $('#signin-form'),
		signupForm = $('#signup-form'),
		popups = $('.popup');

	signinForm.click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($(e.target).is('button')) {
			var formData = signinForm.serialize(),
				signinSuccess = $('#signin-success');
			$.ajax({
				type: 'POST',
				url: '/functions/login.php',
				data: formData,
				success: function (data) {
					if (data == '1') {
						var scroll = $(window).scrollTop(),
							windowHeight = $(window).height(),
							popupHeight = signinSuccess.innerHeight(),
							position = scroll + windowHeight / 2 - popupHeight / 2;
						signinForm[0].reset();
						popups.removeClass('active');
						signinSuccess.css('top', position).addClass('active');
					}
				}
			});
		}
	});

	signupForm.click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		if ($(e.target).is('button')) {
			var formData = signupForm.serialize(),
				pass = $('#password'),
				cPass = $('#confirm-password');
			if (pass[0].value === cPass[0].value) {
				$.ajax({
					type: 'POST',
					url: '/functions/register.php',
					data: formData,
					success: function (data) {
						if (data == '1') {
							window.location.reload();
						} else {
							var signupError = $('#signup-error');
							signupError.find('.message').text(data);
							var scroll = $(window).scrollTop(),
								windowHeight = $(window).height(),
								popupHeight = signupError.innerHeight(),
								position = scroll + windowHeight / 2 - popupHeight / 2;
							signupForm[0].reset();
							signupError.css('top', position).addClass('active');
						}
					}
				});
			} else {
				alert('Password mismatch');
				pass[0].value = '';
				cPass[0].value = '';
			}
		}
	});
}