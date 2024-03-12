$(document).ready(function() {
    // AJAX request to fetch user profile data
    $.ajax({
        url: 'fetch_profile.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Check if profile data is successfully retrieved
            if (data && !data.error) {
                // Update HTML elements with profile data
                $('#name').text(data.name);
                $('#email').text(data.email);
                // Add additional code here to update other profile details if needed
            } else {
                // Display error message if profile data retrieval fails
                $('.container').append('<p>Error: User profile data not found</p>');
            }
        },
        error: function(xhr, status, error) {
            // Display error message if AJAX request fails
            $('.container').append('<p>Error: Failed to fetch user profile data</p>');
            console.error('AJAX Error:', status, error);
        }
    });
});
