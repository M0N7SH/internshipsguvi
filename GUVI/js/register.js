$(document).ready(function() {
    $('.form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Get form data
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        
        // Validate form data
        if (name.trim() === '' || email.trim() === '' || password.trim() === '') {
            alert('Please fill in all fields.');
            return;
        }
        
        // Send AJAX request to register.php
        $.ajax({
            url: 'register.php',
            type: 'POST',
            data: {
                name: name,
                email: email,
                password: password
            },
            success: function(response) {
                alert(response); // Show response from server
                window.location.href = 'login.html'; // Redirect to login page after successful registration
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error message to console
                alert('An error occurred while processing your request. Please try again later.');
            }
        });
    });
});
