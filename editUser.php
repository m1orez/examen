<?php
session_start();
require_once "./script/config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: adminLogin.php");
    exit();
}

$id = $_GET["id"] ?? 0;

$sql = "SELECT * FROM inschrijvingen WHERE inschrijving_ID = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("Gebruiker niet gevonden.");
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker bewerken</title>

    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <section class="formContainer">

        <form class="ticketForm" action="./script/update_user.php" method="POST">
            <h1>Gebruiker bewerken</h1>
            <input type="hidden" name="id" value="<?= $user["inschrijving_ID"] ?>">
            <input type="text" name="voornaam" value="<?= htmlspecialchars($user["Voornaam"]) ?>" required>
            <input type="text" name="achternaam" value="<?= htmlspecialchars($user["Achternaam"]) ?>" required>
            <input type="email" name="email" value="<?= htmlspecialchars($user["Email"]) ?>" required>
            <input type="text" name="telefoonnummer" value="<?= htmlspecialchars($user["Telefoonnummer"]) ?>" required>
            <input type="text" name="adres" value="<?= htmlspecialchars($user["Adres"]) ?>" required>
            <input type="text" name="woonplaats" value="<?= htmlspecialchars($user["Woonplaats"]) ?>" required>
            <input type="date" name="geboortedatum" value="<?= $user["geboortedatum"] ?>" required>
            <select name="geslacht">
                <option value="Man" <?= $user["Geslacht"] === "Man" ? "selected" : "" ?>>
                    Man
                </option>
                <option value="Vrouw" <?= $user["Geslacht"] === "Vrouw" ? "selected" : "" ?>>
                    Vrouw
                </option>
                <option value="Anders" <?= $user["Geslacht"] === "Anders" ? "selected" : "" ?>>
                    Anders
                </option>
            </select>
            <button type="submit">
                Opslaan
            </button>
        </form>
    </section>
</body>
</html>