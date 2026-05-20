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
        <a href="./index.php">Home</a>
        <a href="./info.php">Regels & informatie</a>
        <a class="navButtons" href="./inschrijven.php">Tickets</a>
        <a class="navButtons" href="./login.php">Inloggen</a>
    </nav>
    <section class="formContainer">
        <form action="login_process.php" method="POST"       class="ticketForm">
            <h1>Log in</h1>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            <button type="submit">Log in</button>
            <a id="adminLogin" href="./AdminLogin.php">Admin login</a>
        </form>
    </section>
</body>
</html>