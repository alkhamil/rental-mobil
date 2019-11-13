$(document).ready(function(){
    $("#form-add-users").validate({
        rules: {
            nama: "required",
            email: {
                required: true,
                email: true
            },
            username : "required",
            password : {
                required: true,
                minlength: 6
            }   
        }
    });
    $('#submit').prop('disabled', true);
    $('#cek').on('input', function(e) {
        if($(this).val() === '') {
            $('#submit').prop('disabled', true);
        } else {
            $('#submit').prop('disabled', false);
        }
    });
});