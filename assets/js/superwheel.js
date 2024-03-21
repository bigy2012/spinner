$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "response/superwheel.php",
        data: {
            'slices': 1
        },
        dataType: "json",
        success: function (response) {

            $('#superwheel').superWheel({
                slices: response,
                marker: {
                    animate: true,
                    background: "#93D4FF"
                },
                line: {
                    width: 1,
                    color: "black"
                },
                duration: 4000
            });

            $('#superwheel').superWheel('onStart', function (results, spinCount, now) {
                $('#spin-button').text('Spinner...');
            });

            let tick = new Audio('assets/vendor/superwheel/tick.mp3');
            $('#superwheel').superWheel('onStep', function (results, slicePercent, circlePercent) {
                if (typeof tick.currentTime !== 'undefined') {
                    tick.currentTime = 0;
                }
                tick.play();
            });

            $('#superwheel').superWheel('onComplete', function (results, spinCount, now) {
                Swal.fire({
                    icon: results.custom_key,
                    title: results.message
                })
                $('#spin-button').prop('disabled', false).text('Start');
                $.ajax({
                    type: "post",
                    url: "response/point_coin.php",
                    data: {
                        'point_coin': 1
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#point').html(response.point);
                    }
                });
            });

        }
    });

    $(document).on('click', '#spin-button', function (e) {
        $.ajax({
            type: "post",
            url: "response/superwheel.php",
            data: {
                'percent': 1
            },
            dataType: "json",
            success: function (response) {
                $('#superwheel').superWheel('start', 'id', response.id);
                $('#coin').html(response.coin);
                $('#spin-button').prop('disabled', true);
            }, error: function (error) {
                let response = error.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        });
    });

});