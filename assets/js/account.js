$(document).ready(function () {
    $('#edit_account').submit(function (e) {
        e.preventDefault();
        let form = $(this).serialize();
        Swal.fire({
            title: 'รหัสผ่านปัจจุบัน',
            html: `<input type="password" id="password_present" class="swal2-input" placeholder="รหัสผ่านปัจจุบัน">`,
            confirmButtonText: 'ตกลง',
            focusConfirm: false,
            preConfirm: () => {
                const password = Swal.getPopup().querySelector('#password_present').value
                if (!password) {
                    Swal.showValidationMessage(`กรุณากรอกรหัสผ่านปัจจุบันก่อน`);
                }
                return { password: password }
            }
        }).then((result) => {
            if (result.value) {
                form += "&password_present=" + result.value.password;
                $.ajax({
                    type: "post",
                    url: "response/account.php",
                    data: form,
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            timer: 2000
                        }).then((result) => {
                            location.reload();
                        });
                    }, error: function (error) {
                        let response = error.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        });
                    }
                });
            }
        })
    });
});