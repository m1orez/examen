<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Databaseverbinding
$conn = mysqli_connect(
    "localhost",
    "Admin_086212",
    "Admin_086212",
    "Examen_086212"
);

// Controleren of verbinding werkt
if (!$conn) {
    die("Connectie mislukt: " . mysqli_connect_error());
}

// Formuliergegevens ophalen
$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$adres = $_POST["adres"];
$woonplaats = $_POST["woonplaats"];
$telefoonnummer = $_POST["telefoonnummer"];
$geboortedatum = $_POST["geboortedatum"];
$geslacht = $_POST["geslacht"];

// Wachtwoord hashen
$wachtwoord = password_hash(
    $_POST["wachtwoord"],
    PASSWORD_DEFAULT
);


// SQL query voorbereiden
$sql = "
INSERT INTO inschrijvingen
(
    Voornaam,
    Achternaam,
    Adres,
    Woonplaats,
    Telefoonnummer,
    geboortedatum,
    Geslacht,
    Wachtwoord
)

VALUES (?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $sql);

// Waarden koppelen aan query
mysqli_stmt_bind_param(
    $stmt,
    "ssssssss",

    $voornaam,
    $achternaam,
    $adres,
    $woonplaats,
    $telefoonnummer,
    $geboortedatum,
    $geslacht,
    $wachtwoord
);


// Query uitvoeren
if (mysqli_stmt_execute($stmt)) {
    echo "Registratie succesvol";
} else {
    echo "Fout: " . mysqli_error($conn);
}

// sluit connectie
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>