<?php
    $servername = "188.166.24.55";
    $dbUsername = "jepsen5-cherylstrayed";
    $dbPassword = "gxYOzrCJQ^.2CX85HsFR";
    $dbname = "jepsen5-cherylstrayed";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3306", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $pdo_exception) {
        echo "connection Failed!";
        echo $pdo_exception->getMessage();
        exit;
    }