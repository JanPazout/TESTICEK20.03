<?php
//vytvarim si username a password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

//vytvarim connection pro pripojovani k databazi
    $conn = new mysqli("localhost", "username", "password", "database");

    //pokud ma kod fungovat, musite dat do localhost,username,password a database
    //jmeno serveru, kde bezi vase databaaze(moje bezi na SQL manageent studio),
    //pak vase prihlasovaci udaje a jmeno databaze. To stejne plati pro login.php

    if ($conn->connect_error) {
        die("Chyba připojení k databázi: " . $conn->connect_error);
    }
    //pokud nefunguje connection, hodi nam to error

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrace proběhla úspěšně";
        header("Location: dashboard.html");
    } else {
        echo "Chyba při registraci: " . $conn->error;
    }
    //misto selectu v login kde to nacita, tak to insertuje heslo a username, podle toho jake napisu.
    //pokud registrace probehla uspesne, tak nas to presune na dashboard.html

    $conn->close();
    //vypnuti connection k databazi

}
?>
