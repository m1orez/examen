<?php
session_start();
require_once "config.php";

if (!isset($_SESSION["admin"])) {
    exit();
}

$id = $_GET["id"] ?? 0;

$sql = "DELETE FROM inschrijvingen WHERE inschrijving_ID = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

header("Location: ../adminDashboard.php");
exit();
?>