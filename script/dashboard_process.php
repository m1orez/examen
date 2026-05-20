<?php

require_once "auth.php";
require_once "config.php";


/* Alleen POST verzoeken toestaan */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../dashboard.php");
    exit();
}


/* Ingelogde gebruiker */
$user_id = $_SESSION["user_id"];


/* Bewerkbare velden */
$voornaam = trim($_POST["voornaam"] ?? "");
$achternaam = trim($_POST["achternaam"] ?? "");

$adres = trim($_POST["adres"] ?? "");
$woonplaats = trim($_POST["woonplaats"] ?? "");

$email = trim($_POST["email"] ?? "");
$telefoonnummer = trim($_POST["telefoonnummer"] ?? "");


/* Update gebruiker */
$sql = "
UPDATE inschrijvingen
SET
    Voornaam = ?,
    Achternaam = ?,
    Adres = ?,
    Woonplaats = ?,
    Email = ?,
    Telefoonnummer = ?
WHERE inschrijving_ID = ?
";

$stmt = mysqli_prepare($conn, $sql);


/* Controle SQL */
if (!$stmt) {
    die("SQL fout: " . mysqli_error($conn));
}


/* Parameters koppelen */
mysqli_stmt_bind_param(
    $stmt,
    "ssssssi",
    $voornaam,
    $achternaam,
    $adres,
    $woonplaats,
    $email,
    $telefoonnummer,
    $user_id
);


/* Uitvoeren */
if (mysqli_stmt_execute($stmt)) {

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: ../dashboard.php?success=1");
    exit();
}


/* Foutmelding */
die("Opslaan mislukt: " . mysqli_error($conn));

?>