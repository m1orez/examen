<?php
session_start();

// Databaseverbinding
$conn = mysqli_connect(
    "localhost",
    "Admin_086212",
    "Admin_086212",
    "Examen_086212"
);

// Controle verbinding
if (!$conn) {
    die("Connectie mislukt: " . mysqli_connect_error());
}

// Alleen uitvoeren wanneer formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Gegevens ophalen
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    // Query voorbereiden
    $sql = "SELECT * FROM inschrijvingen WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Controleren of gebruiker bestaat
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Wachtwoord controleren
        if (password_verify($wachtwoord, $user["Wachtwoord"])) {

            // Session gegevens opslaan
            $_SESSION["user_id"] = $user["inschrijving_ID"];
            $_SESSION["voornaam"] = $user["Voornaam"];
            $_SESSION["email"] = $user["Email"];

            // Doorsturen naar dashboard
            header("Location: dashboard.php");
            exit();

        } else {
            echo "Onjuist wachtwoord.";
        }

    } else {
        echo "Email bestaat niet.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>