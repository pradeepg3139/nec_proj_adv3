$(document).ready(function() {
    // Registration AJAX
    $('#registerForm').submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    $('#registrationMessage').html('<div id="success">' + response.message + '</div>');
                    // Optionally redirect or display success message
                } else {
                    $('#registrationMessage').html('<div id="error">' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#registrationMessage').html('<div id="error">An error occurred while processing your request.</div>');
            }
        });
    });

    // Login AJAX
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    $('#loginMessage').html('<div id="success">' + response.message + '</div>');
                    // Optionally redirect or display success message
                } else {
                    $('#loginMessage').html('<div id="error">' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#loginMessage').html('<div id="error">An error occurred while processing your request.</div>');
            }
        });
    });
});
