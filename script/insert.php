<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../inschrijven.php");
    exit();
}

$voornaam = trim($_POST["voornaam"] ?? "");
$achternaam = trim($_POST["achternaam"] ?? "");
$adres = trim($_POST["adres"] ?? "");
$woonplaats = trim($_POST["woonplaats"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefoonnummer = trim($_POST["telefoonnummer"] ?? "");
$geboortedatum = $_POST["geboortedatum"] ?? "";
$geslacht = $_POST["geslacht"] ?? "";
$wachtwoord = $_POST["wachtwoord"] ?? "";


/* Max 1000 accounts */

$countSql = "SELECT COUNT(*) AS totaal FROM inschrijvingen";
$countResult = mysqli_query($conn, $countSql);
$count = mysqli_fetch_assoc($countResult);

if ($count["totaal"] >= 1000) {
    die("Inschrijven is gesloten. Er zijn al 1000 deelnemers.");
}


/* Check dubbele email */

$checkSql = "SELECT inschrijving_ID FROM inschrijvingen WHERE Email = ?";
$checkStmt = mysqli_prepare($conn, $checkSql);

mysqli_stmt_bind_param($checkStmt, "s", $email);
mysqli_stmt_execute($checkStmt);

$checkResult = mysqli_stmt_get_result($checkStmt);

if (mysqli_num_rows($checkResult) > 0) {
    die("Er bestaat al een account met dit emailadres.");
}


/* Hash wachtwoord */

$hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);


/* query */

$sql = "
INSERT INTO inschrijvingen
(
    Voornaam,
    Achternaam,
    Adres,
    Woonplaats,
    Email,
    Telefoonnummer,
    Geboortedatum,
    Geslacht,
    Wachtwoord
)
VALUES
(
    ?,?,?,?,?,?,?,?,?
)
";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("SQL fout: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssss",
    $voornaam,
    $achternaam,
    $adres,
    $woonplaats,
    $email,
    $telefoonnummer,
    $geboortedatum,
    $geslacht,
    $hashedPassword
);

if (mysqli_stmt_execute($stmt)) {

    $newUserId = mysqli_insert_id($conn);

    $_SESSION["user_id"] = $newUserId;
    $_SESSION["voornaam"] = $voornaam;
    $_SESSION["email"] = $email;

    header("Location: ../dashboard.php");
    exit();
}

die("Registratie mislukt.");
?>