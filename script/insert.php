<?php

session_start();
require_once "config.php";


/* Alleen POST requests toestaan */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../inschrijven.php");
    exit();
}


/* Formuliergegevens ophalen */

$voornaam = trim($_POST["voornaam"] ?? "");
$achternaam = trim($_POST["achternaam"] ?? "");
$adres = trim($_POST["adres"] ?? "");
$woonplaats = trim($_POST["woonplaats"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefoonnummer = trim($_POST["telefoonnummer"] ?? "");
$geboortedatum = $_POST["geboortedatum"] ?? "";
$geslacht = $_POST["geslacht"] ?? "";
$wachtwoord = $_POST["wachtwoord"] ?? "";


/* Controle maximaal 1000 inschrijvingen */

$countSql = "SELECT COUNT(*) AS totaal FROM inschrijvingen";

$countResult = mysqli_query($conn, $countSql);
$count = mysqli_fetch_assoc($countResult);

if ($count["totaal"] >= 1000) {
    die("Inschrijven is gesloten. Er zijn al 1000 deelnemers.");
}


/* Controle op dubbele email */

$checkSql =
    "SELECT inschrijving_ID
FROM inschrijvingen
WHERE Email = ?";

$checkStmt =
    mysqli_prepare($conn, $checkSql);

mysqli_stmt_bind_param(
    $checkStmt,
    "s",
    $email
);

mysqli_stmt_execute($checkStmt);

$checkResult =
    mysqli_stmt_get_result($checkStmt);

if (
    mysqli_num_rows($checkResult) > 0
) {
    die(
        "Er bestaat al een account met dit emailadres."
    );
}


/* Wachtwoord hashen */

$hashedPassword =
    password_hash(
        $wachtwoord,
        PASSWORD_DEFAULT
    );


/* Nieuwe gebruiker toevoegen */

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

$stmt =
    mysqli_prepare(
        $conn,
        $sql
    );


/* SQL fout controleren */

if (!$stmt) {
    die(
        "SQL fout: "
        .
        mysqli_error($conn)
    );
}


/* Waarden koppelen */

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


/* Query uitvoeren */

if (
    mysqli_stmt_execute($stmt)
) {


    /* Nieuwe gebruiker ID ophalen */

    $newUserId =
        mysqli_insert_id($conn);


    /* Sessie starten */

    $_SESSION["user_id"] =
        $newUserId;
    $_SESSION["voornaam"] =
        $voornaam;
    $_SESSION["email"] =
        $email;

    /* Doorsturen naar dashboard */
    header(
        "Location:
        ../dashboard.php"
    );
    exit();

}


/* Foutmelding */

die(
    "Registratie mislukt."
);

?>