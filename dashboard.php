<?php
require_once "./script/auth.php";
require_once "./script/config.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM inschrijvingen WHERE inschrijving_ID = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("SQL fout: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("Gebruiker niet gevonden.");
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WK de Kup | Dashboard</title>

    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <section class="formContainer">
        <form id="dashboardForm" class="ticketForm" method="POST" action="./script/dashboard_process.php">
            <h1>Mijn gegevens</h1>

            <?php if (isset($_GET["success"])): ?>
                <p class="success">
                    Gegevens opgeslagen
                </p>
            <?php endif; ?>

            <input type="text" name="voornaam" value="<?= htmlspecialchars($user["Voornaam"]) ?>" readonly>
            <input type="text" name="achternaam" value="<?= htmlspecialchars($user["Achternaam"]) ?>" readonly>
            <input type="text" name="adres" value="<?= htmlspecialchars($user["Adres"]) ?>" readonly>
            <input type="text" name="woonplaats" value="<?= htmlspecialchars($user["Woonplaats"]) ?>" readonly>
            <input type="email" name="email" value="<?= htmlspecialchars($user["Email"]) ?>" readonly>
            <input type="text" name="telefoonnummer" value="<?= htmlspecialchars($user["Telefoonnummer"]) ?>" readonly>

            <!-- Niet bewerkbaar -->
            <input type="text" value="<?= htmlspecialchars($user["geboortedatum"]) ?>" readonly class="readonly">
            <input type="text" value="<?= htmlspecialchars($user["Geslacht"]) ?>" readonly class="readonly">

            <button type="button" id="editBtn">Bewerken</button>

            <button type="submit" id="saveBtn" class="hidden">Opslaan</button>

            <button id="uitschrijfButton" type="button" onclick="removeAccount()">Uitschrijven</button>
        </form>
    </section>
</body>
    <script src="./script/dashboard.js"></script>
</html>