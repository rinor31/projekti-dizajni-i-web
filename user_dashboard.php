<?php
session_start();
if (!isset($_SESSION["username"]) || $_SESSION["role"] != "user") {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Përdorues</title>
</head>
<body>
    <h1>Mirësevini, <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php">Dil</a>
</body>
</html>
