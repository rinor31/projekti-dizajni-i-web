<?php
session_start();
if (!isset($_SESSION["username"]) || $_SESSION["role"] != "admin") {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Mirësevini, Admin <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php">Dil</a>
</body>
</html>
