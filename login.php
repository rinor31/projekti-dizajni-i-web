<?php
session_start(); 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

   
    $sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
      
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

          
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
        } else {
            echo "Fjalëkalimi është i gabuar!";
        }
    } else {
        echo "Përdoruesi nuk ekziston!";
    }

    $conn->close();
}
?>
