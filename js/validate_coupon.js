
$(function() {

	// Get the form.
	var form = $('#form-id');

	// Get the messages div.
	var formMessages = $('#display-coupon');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();
		

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: 'validate_form.php',
			data: formData,
		})
		.done(function(response) {			

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#code').val('');
		})
		.fail(function(data) {

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});

	});

});
