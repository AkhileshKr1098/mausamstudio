$(document).ready(function () {
    $('#contact-form').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'https://mausamstudiomailsend.vercel.app/api/sendEmail', // Updated to point to the Node.js API on Vercel
            data: formData,
            success: function (response) {
                $('#contact-form')[0].reset();
                $('#response').html(response.message);
                alert('Message Successfully Submitted');
            },
            error: function () {
                alert('Message Not Submitted');
            }
        });
    });
});
