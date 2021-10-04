$(document).ready(function () {

    $('#submit').click(function (event) {
        event.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        $.post("contactForm/contactform.php", {
            name: name,
            email: email,
            subject: subject,
            message: message
        }, function (answer) {
            if (answer == 'OK') {
                $("#error").addClass('d-none');
                $("#error").removeClass('show');
                $("#success").addClass('show');
                $("#success").removeClass('d-none');
                $("#success").html('Se han recibido los datos de forma satisfactoria<br><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
                name.val('');
                email.val('');
                subject.val('');
                message.val('');
            } else {
                $("#success").addClass('d-none');
                $("#success").removeClass('show');
                $("#error").removeClass('d-none');
                $("#error").addClass('show');
                $("#error").html(answer+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
            }

        });

    });

});
