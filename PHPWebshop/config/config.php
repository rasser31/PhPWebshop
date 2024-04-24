<?php
    $host = "localhost";
    $user = "admin";
    $pass = "admin";
    $dbname = "bookstore";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>
