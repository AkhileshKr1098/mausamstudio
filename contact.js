$(document).ready(function(){
    $('#contact-form').submit(function(e){
        e.preventDefault(); // Prevent form submission
        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'send_contact.php', // PHP script for sending email
            data: formData,
            success: function (response) {
                $('#contact-form')[0].reset(); // Reset the form
                $('#response').html(response); // Display response
                alert('Message Successfully Submmited'); // Show alert last
            },
            error: function () {
                alert('Message Not Submmited');
            }
        });
    });    
});