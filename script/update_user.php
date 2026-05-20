<?php
session_start();
require_once "config.php";

if (!isset($_SESSION["admin"])) {
    exit();
}

$id = $_POST["id"];

$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$email = $_POST["email"];
$telefoonnummer = $_POST["telefoonnummer"];
$adres = $_POST["adres"];
$woonplaats = $_POST["woonplaats"];
$geboortedatum = $_POST["geboortedatum"];
$geslacht = $_POST["geslacht"];


/* Prevent duplicate email */

$checkSql = "
SELECT inschrijving_ID
FROM inschrijvingen
WHERE Email = ?
AND inschrijving_ID != ?
";

$checkStmt =
mysqli_prepare($conn, $checkSql);

mysqli_stmt_bind_param(
    $checkStmt,
    "si",
    $email,
    $id
);

mysqli_stmt_execute($checkStmt);

$exists =
mysqli_stmt_get_result($checkStmt);

if (mysqli_num_rows($exists) > 0) {
    die("Email bestaat al.");
}



/* Update user */

$sql = "
UPDATE inschrijvingen

SET
Voornaam=?,
Achternaam=?,
Email=?,
Telefoonnummer=?,
Adres=?,
Woonplaats=?,
Geboortedatum=?,
Geslacht=?

WHERE inschrijving_ID=?
";


$stmt =
mysqli_prepare(
    $conn,
    $sql
);


mysqli_stmt_bind_param(
    $stmt,
    "ssssssssi",

    $voornaam,
    $achternaam,
    $email,
    $telefoonnummer,
    $adres,
    $woonplaats,
    $geboortedatum,
    $geslacht,
    $id
);


mysqli_stmt_execute($stmt);


header(
    "Location: ../adminDashboard.php"
);

exit();
?>