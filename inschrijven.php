<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WK de kuip | Inschrijven</title>
    <!-- algemene website styling -->
    <link rel="stylesheet" href="./styles/general.css" />
    <!-- pagina specifieke styling -->
    <link rel="stylesheet" href="./styles/inschrijven_login.css" />
</head>
<body>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./info.php">Regels & informatie</a>
        <a class="navButtons" href="./inschrijven.php">Tickets</a>
        <a class="navButtons" href="./login.php">Inloggen</a>
    </nav>
    <!-- Formulier container -->
    <section class="formContainer">
        <form class="ticketForm" action="./script/insert.php" method="POST">
            <h1>Inschrijven</h1>
            <div class="row">
                <input type="text" name="voornaam" placeholder="Voornaam" required>
                <input type="text" name="achternaam" placeholder="Achternaam" required>
            </div>
            <input type="text" name="adres" placeholder="Adres" required>
            <input type="text" name="woonplaats" placeholder="Woonplaats" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" required>
            <input type="date" name="geboortedatum" required>

            <select name="geslacht" required>
                <option value="">
                    Kies geslacht
                </option>
                <option value="Man">Man</option>
                <option value="Vrouw">Vrouw</option>
                <option value="Anders">Anders</option>
            </select>

            <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            <button type="submit">Account aanmaken</button>
            <p id="adminLogin">
                Heb je al een account?
                <a href="login.php">
                    Log hier in
                </a>
            </p>
        </form>
</body>

</html>