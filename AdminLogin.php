<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WK de Kup | Admin login</title>
    <!-- algemene styling -->
    <link rel="stylesheet" href="./styles/general.css">
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
        <form class="ticketForm" action="./script/adminLogin_process.php" method="POST">
            <h1>Admin login</h1>
                <input
                    type="text"
                    name="username"
                    placeholder="Gebruikersnaam"
                    required
                >
                <input
                    type="password"
                    name="password"
                    placeholder="Wachtwoord"
                    required
                >
            <button type="submit">Inloggen</button>
        </form>
    </section>
</body>
</html>