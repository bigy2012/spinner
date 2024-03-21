$(document).ready(function () {
    $('#login').submit(function (e) {
        e.preventDefault();
        let form = $(this).serialize();
        $.ajax({
            type: "post",
            url: "response/login.php",
            data: form,
            dataType: "json",
            success: function (response) {
                location.href = '.';
            }, error: function (error) {
                let response = error.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: response.message
                });
            }
        });
    });
});