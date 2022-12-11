$(document).ready(function () {
    // countdown for next prayer time
    initCountdown();

    // dil degisimi
    initLanguageChangerTimer(5000);

    // page checker for Hutbe and Dashboard
    initPageChecker();

    Reveal.initialize({
        autoSlide: 3000,
        loop: true
    });
});

var initPageChecker = function(time = 3000) {

    var currentPageId = $('[data-page-id]').eq(0).data('page-id');

    setInterval(function () {

        $.get('index.php?r=site/page-id', function (data) {
            if (currentPageId != data.pageId) {
                location.reload();
            }
        });

    }, time);
}

var initLanguageChangerTimer = function(time = 10000) {
    var index = 0;
    setInterval(function () {
        index = ++index % 3;
        $('[data-lang]').removeClass('active');
        $('[data-lang]').eq(index).addClass('active');

    }, time);
}

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
                element.innerHTML = hours < 10 ? '0' + hours : hours;
            });
        Array.from(document.getElementsByClassName("countdown-minutes"))
            .forEach(function (element, index, array) {
                element.innerHTML = minutes < 10 ? '0' + minutes : minutes;
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

