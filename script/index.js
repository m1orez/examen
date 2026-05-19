// live countdown tot wedstrijd
var countDownDate = new Date("July 19, 2026 19:00:00").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("countdown").innerHTML = days + "d " + hours + "u "
  + minutes + "m " + seconds + "s ";

//   als de countdown datum voorbij is vervang text met 'Evenement countdown afgelopen'
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Evenement countdown afgelopen";
  }
}, 1000);