<?php

require_once "auth.php";
require_once "config.php";

$user_id =
    $_SESSION["user_id"];

/* verwijder account*/

$sql = "DELETE FROM inschrijvingen WHERE inschrijving_ID = ?";

$stmt =
    mysqli_prepare(
        $conn,
        $sql
    );

mysqli_stmt_bind_param(
    $stmt,"i",$user_id
);
if (
    mysqli_stmt_execute(
        $stmt
    )
) {
    session_destroy();
    header(
        "Location:../index.php"
    );
    exit();
} else {
    die(
        "Verwijderen mislukt");
}
?>