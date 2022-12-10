$(document).ready(function () {
    initCountdown();

    var index = 0;
    $('[data-lang]').eq(index).addClass('active');

    setInterval(function () {
        index = ++index % 3;
        $('[data-lang]').removeClass('active');
        $('[data-lang]').eq(index).addClass('active');

    }, 3000);
});

var initCountdown = function () {
    var countDownElement = $('#countdown');

    // Set the date we're counting down to
    // var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

    var timestamp = $('#countdown').data('nexttime');
    var now = new Date();
    var countDownDate = new Date(now.getTime() + (timestamp * 1000));

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        Array.from(document.getElementsByClassName("countdown-hours"))
            .forEach(function (element, index, array) {
                element.innerHTML = hours;
            });
        Array.from(document.getElementsByClassName("countdown-minutes"))
            .forEach(function (element, index, array) {
                element.innerHTML = minutes;
            });
        Array.from(document.getElementsByClassName("countdown-seconds"))
            .forEach(function (element, index, array) {
                element.innerHTML = seconds < 10 ? '0' + seconds : seconds;
            });

        // If the count down is finished, write some text
        if (distance < 0) {
            location.reload();
        }
    }, 1000);
}

