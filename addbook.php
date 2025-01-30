<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];

    $stmt = $conn->prepare("INSERT INTO books (title, author, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $title, $author, $price);
    $stmt->execute();
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shto Libër</title>
</head>
<body>
    <h2>Shto një libër të ri</h2>
    <form action="add_book.php" method="POST">
        <input type="text" name="title" placeholder="Titulli" required>
        <input type="text" name="author" placeholder="Autori" required>
        <input type="number" name="price" placeholder="Çmimi" step="0.01" required>
        <button type="submit">Shto</button>
    </form>
</body>
</html>
