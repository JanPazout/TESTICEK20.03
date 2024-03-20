<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "username", "password", "database");

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrace proběhla úspěšně";
    } else {
        echo "Chyba při registraci: " . $conn->error;
    }

    $conn->close();
}
?>
