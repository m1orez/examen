<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../login.php");
    exit();
}

$email = trim($_POST["email"] ?? "");
$wachtwoord = $_POST["wachtwoord"] ?? "";

$sql = "SELECT * FROM inschrijvingen WHERE Email = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("SQL fout: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($wachtwoord, $user["Wachtwoord"])) {

    $_SESSION["user_id"] = $user["inschrijving_ID"];
    $_SESSION["voornaam"] = $user["Voornaam"];
    $_SESSION["email"] = $user["Email"];

    header("Location: ../dashboard.php");
    exit();

} else {
    die("Inloggen mislukt");
}
?>