<?php
    $servername = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "hiking";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3306", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $pdo_exception) {
        echo "connection Failed!";
        echo $pdo_exception->getMessage();
        exit;
    }