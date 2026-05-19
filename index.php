<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WK de kuip | Home</title>
    <!-- algemene website styling -->
    <link rel="stylesheet" href="./styles/general.css" />
    <!-- pagina specifieke styling -->
    <link rel="stylesheet" href="./styles/index.css" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=BBH+Bartle&family=BBH+Bogle&family=Carter+One&family=Contrail+One&family=Racing+Sans+One&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <a id="active" href="./index.php">Home</a>
      <a href="./info.php">Regels & informatie</a>
      <a class="navButtons" href="./inschrijven.php">Tickets</a>
      <a class="navButtons" href="./login.php">Inloggen</a>
    </nav>
    <header>
      <h2>FINALE WK 2026 START OVER:</h2>
      <!-- countdown tot evenement -->
        <h1 id="countdown"></h1>
        <!-- Inschrijf button -->
      <a id="ticketButton" href="./inschrijven.html">Haal hier je tickets</a>
    </header>
    <footer></footer>
  </body>
  <script src="./script/index.js"></script>
</html>
