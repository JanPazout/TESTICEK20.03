<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "username", "password", "database");

       //pokud ma kod fungovat, musite dat do localhost,username,password a database
        //jmeno serveru, kde bezi vase databaaze(moje bezi na SQL manageent studio),
        //pak vase prihlasovaci udaje a jmeno databaze. To stejne plati pro register.php

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Nesprávné uživatelské jméno nebo heslo";
    }

    $conn->close();
}
?>
