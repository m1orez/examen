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
        <a href="">Regels & informatie</a>
        <a class="navButtons" href="./inschrijven.php">Tickets</a>
        <a class="navButtons" href="">Inloggen</a>
    </nav>
    <!-- Formulier container -->
    <section class="formContainer">
        <!-- Inschrijfformulier -->
        <form action="insert.php" method="POST" class="ticketForm">
            <h1>Inschrijven</h1>
            <div class="row">
                <!-- naam -->
                <input type="text" name="voornaam" placeholder="Voornaam" required>
                <input type="text" name="achternaam" placeholder="Achternaam" required>
            </div>
            <!-- Adres -->
            <input type="text" name="adres" placeholder="Adres" required>
            <!-- Woonplaats -->
            <input type="text" name="woonplaats" placeholder="Woonplaats" required>
            <!-- Email -->
            <input type="text" name="email" placeholder="Email" required>
            <!-- Telefoonnummer -->
            <input type="tel" name="telefoonnummer" placeholder="Telefoonnummer" maxlength="10" required>
            <!-- Geboortedatum + geslacht -->
            <div class="row">
                <input type="date" name="geboortedatum" required>
                <select name="geslacht" required>
                    <option value="">Geslacht</option>
                    <option>M</option>
                    <option>V</option>
                    <option>X</option>
                </select>
            </div>
            <!-- Wachtwoord -->
            <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            <!-- Submitknop -->
            <button>Registreren</button>
        </form>
    </section>
    </section>
</body>
</html>