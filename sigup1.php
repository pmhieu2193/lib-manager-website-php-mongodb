<?php
    include("connection.php");
    session_start(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $address = $_POST["address"];
        echo $email;
        echo $password;
        echo $name;
        echo $number;
        echo $address;

    }
?>