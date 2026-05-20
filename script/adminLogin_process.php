<?php
session_start();

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";


if (
    $username === "admin"
    &&
    $password === "#1Geheim"
) {
    $_SESSION["admin"] = true;
    header("Location: ../adminDashboard.php");
    exit();
}

die("Verkeerde login.");
?>