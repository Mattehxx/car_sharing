$(document).ready(function() {
    $('#sumbit_button').click(()=> {
        let nominativo=$('#nome').val()+$('#cognome').val();

        var formData = {
            nominativo: nominativo,
            n_patente: $('#n_patente').val(),
            scadenza_patente: $('#scadenza_patente').val(),
            email: $('#email').val(),
            telefono: $('#tel').val()
        };

        $.ajax({
            type: 'POST',
            url: '../auth/signup.php',
            data: formData,
            dataType: 'json',

            success: (data)=> {
                console.log(data);
                window.location.replace('../uploads/form.html');
            },
            error: (data)=> {
                console.log(data);
                let error_alert=$('<div class="alert alert-danger" role="alert"></div>').text('Registration request failed. Try again!');
                $('#alert_row').append(error_alert);
            }
        });
    });
});