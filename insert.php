<?php
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
// check of er minder dan 1000 tickets zijn verkocht

$countQuery = "SELECT MAX(inschrijving_ID) AS last_id FROM inschrijvingen";
$countResult = mysqli_query($conn, $countQuery);
$row = mysqli_fetch_assoc($countResult);

if ($row['last_id'] >= 1000) {
    echo "<script>
        alert('Alle tickets zijn uitverkocht!');
        window.history.back();
    </script>";
    exit();
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
mysqli_stmt_execute($stmt);

// sluit connectie
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>