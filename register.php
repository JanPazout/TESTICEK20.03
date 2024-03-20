<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "username", "password", "database");

    //pokud ma kod fungovat, musite dat do localhost,username,password a database
    //jmeno serveru, kde bezi vase databaaze(moje bezi na SQL manageent studio),
    //pak vase prihlasovaci udaje a jmeno databaze. To stejne plati pro login.php

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrace proběhla úspěšně";
        header("Location: dashboard.php");
    } else {
        echo "Chyba při registraci: " . $conn->error;
    }

    $conn->close();

}
?>
