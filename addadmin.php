<?php
include "config.php";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$conn->query("INSERT INTO admins (username, password) VALUES ('admin', '$password')");
echo "Admini u shtua me sukses!";
?>
