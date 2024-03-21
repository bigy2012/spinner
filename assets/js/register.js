$(document).ready(function () {
    $('#register').submit(function (e) {
        e.preventDefault();
        let form = $(this).serialize();
        $('#btn_register').prop('disabled', true);
        $.ajax({
            type: "post",
            url: "response/register.php",
            data: form,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    timer: 2000
                }).then((result) => {
                    location.href = 'login.php';
                });
            }, error: function (error) {
                let response = error.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: response.message
                });
            }
        });
        $('#btn_register').prop('disabled', false);
    });
});