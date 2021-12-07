<?php
    $servername = "188.166.24.55";
    $dbUsername = "jepsen5-cherylstrayed";
    $dbPassword = "gxYOzrCJQ^.2CX85HsFR";
    $dbname = "jepsen5-cherylstrayed";

    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }