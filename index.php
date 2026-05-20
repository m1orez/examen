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
    rel="stylesheet" />
</head>

<body>
  <nav>
    <a id="active" href="./index.php">Home</a>
    <a href="./info.php">Informatie</a>
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
  <section class="regelsSection">
    <h1>Regels & Informatie</h1>
    <details class="regelBlok">
      <summary>📍 Locatie</summary>
      <p>
        Het evenement vindt plaats in De Kuip:
        <br>
        Van Zandvlietplein 1
        <br>
        3077 AA Rotterdam
      </p>
    </details>
    <details class="regelBlok">
      <summary>🎟 Toegang</summary>
      <p>
        Toegang is alleen mogelijk met een geldig ticket
        en identiteitsbewijs.
      </p>
    </details>
    <details class="regelBlok">
      <summary>⏰ Openingstijden</summary>
      <p>
        De deuren openen 2 uur voor aanvang van de wedstrijd.
        Kom op tijd om drukte te voorkomen.
      </p>
    </details>
    <details class="regelBlok">
      <summary>🚫 Verboden voorwerpen</summary>
      <ul>
        <li>Vuurwerk</li>
        <li>Wapens of gevaarlijke objecten</li>
        <li>Alcohol van buitenaf</li>
        <li>Drugs</li>
        <li>Professionele opnameapparatuur zonder toestemming</li>
      </ul>
    </details>
    <details class="regelBlok">
      <summary>🍔 Eten & drinken</summary>
      <p>
        Binnen het stadion zijn verkooppunten aanwezig.
      </p>
    </details>
    <details class="regelBlok">
      <summary>♿ Toegankelijkheid</summary>
      <p>
        De Kuip beschikt over faciliteiten voor bezoekers
        met een beperking.
      </p>
    </details>
    <details class="regelBlok">
      <summary>🛡 Veiligheid</summary>
      <p>
        Aanwijzingen van beveiliging moeten altijd worden opgevolgd.
      </p>
    </details>
    <details class="regelBlok">
      <summary>⚽ Gedragsregels</summary>
      <ul>
        <li>Respecteer andere bezoekers</li>
        <li>Geen agressie of discriminatie</li>
        <li>Volg stadioninstructies op</li>
      </ul>
    </details>
  </section>
</body>
<script src="./script/index.js"></script>

</html>