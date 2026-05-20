// Live countdown tot wedstrijd

var countDownDate = new Date("July 19, 2026 19:00:00").getTime();

var x = setInterval(function () {

  var now = new Date().getTime();
  var distance = countDownDate - now;


  // Als datum voorbij is

  if (distance <= 0) {
    clearInterval(x);

    document.getElementById("countdown").innerHTML =
      "Evenement countdown afgelopen";

    return;
  }


  // Tijd berekenen

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));

  var hours = Math.floor(
    (distance % (1000 * 60 * 60 * 24))
    / (1000 * 60 * 60)
  );

  var minutes = Math.floor(
    (distance % (1000 * 60 * 60))
    / (1000 * 60)
  );

  var seconds = Math.floor(
    (distance % (1000 * 60))
    / 1000
  );


  // Countdown tonen

  document.getElementById("countdown").innerHTML =
    days + "d "
    + hours + "u "
    + minutes + "m "
    + seconds + "s";

}, 1000);