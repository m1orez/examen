<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WK de Kuip | Inloggen</title>
    <!-- algemene website styling -->
    <link rel="stylesheet" href="./styles/general.css" />
    <!-- pagina specifieke styling -->
    <link rel="stylesheet" href="./styles/inschrijven_login.css">
</head>

<body>
<nav>
    <button id="hamburger">
      ☰
    </button>
    <div class="navLinks">
      <a href="./index.php">Home</a>
      <a href="./info.php">Informatie</a>
      <a class="navButtons" href="./inschrijven.php">Tickets</a>
      <a class="navButtons" href="./login.php">Inloggen
      </a>
    </div>
  </nav>
    <section class="formContainer">
        <form class="ticketForm" action="./script/login_process.php" method="POST">
            <h1>Inloggen</h1>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            <button type="submit">Inloggen</button>
            <a href="./adminLogin.php" id="adminLogin">Admin login</a>
        </form>
    </section>
</body>
    <script src="./script/nav.js"></script>
</html>