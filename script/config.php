<?php

$conn = mysqli_connect(
    "localhost",
    "Admin_086212",
    "Admin_086212",
    "Examen_086212"
);

if (!$conn) {
    die("Database connectie mislukt: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>