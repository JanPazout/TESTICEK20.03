<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "username", "password", "database");

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: profile.php");
    } else {
        echo "Nesprávné uživatelské jméno nebo heslo";
    }

    $conn->close();
}
?>
