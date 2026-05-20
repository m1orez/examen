<?php
session_start();
require_once "./script/config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: adminLogin.php");
    exit();
}

$countQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS totaal FROM inschrijvingen"
);

$count = mysqli_fetch_assoc($countQuery);

$users = mysqli_query(
    $conn,
    "SELECT * FROM inschrijvingen"
);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WK de Kuip | Admin dashboard</title>

    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/adminDashboard.css">
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <section class="formContainer">
        <div class="ticketForm">
            <h1>Admin panel</h1>
            <div class="adminStats">
                Aantal inschrijvingen:
                <strong>
                    <?= $count["totaal"] ?>/1000
                </strong>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Telefoon</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($user["Voornaam"]) ?>
                                <?= htmlspecialchars($user["Achternaam"]) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user["Email"]) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user["Telefoonnummer"]) ?>
                            </td>
                            <td>
                                <a class="actionBtn" href="editUser.php?id=<?= $user["inschrijving_ID"] ?>">Bewerk</a>
                                <a class="actionBtn deleteBtn"
                                    href="./script/delete_user.php?id=<?= $user["inschrijving_ID"] ?>"
                                    onclick="return confirm('Weet je het zeker?')">Verwijder</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>