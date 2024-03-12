$(document).ready(function() {
    $('.form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response) {
                alert(response); // Display response message
                // Redirect to profile page if login successful
                if (response.includes('successful')) {
                    window.location.href = 'profile.html';
                }
            }
        });
    });
});
