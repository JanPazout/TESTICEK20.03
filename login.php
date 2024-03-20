<?php
session_start();

//tady si vytvarim promenne username a password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
//vytvoreni connection pro pripojeni  databazi
    $conn = new mysqli("localhost", "username", "password", "database");

       //pokud ma kod fungovat, musite dat do localhost,username,password a database
        //jmeno serveru, kde bezi vase databaaze(moje bezi na SQL manageent studio),
        //pak vase prihlasovaci udaje a jmeno databaze. To stejne plati pro register.php

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }
    //chyba pripojovani k databazi kvuli connection

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    //nacitani useru a passwordu pomoci selectu

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.html");
    } else {
        echo "Nesprávné uživatelské jméno nebo heslo";
    }
    //pokud sedi password, a username, tak nas to prihlasi, a presune na dashboard.html. Pokud ne, hodi nam to error

    $conn->close();
    //vypnuti connection
}
?>
