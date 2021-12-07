<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $travel = $_POST["travel"];
        $duration = $_POST["duration"];
        $elevation = $_POST["elevation"];
        $ooguu = $_POST["ooguu"]; 

        require_once 'mysqli.inc.php';
        require_once 'function.inc.php';

        if (emptyInputCreat() !== false) {
            header("location: ../create.php");
            exit();
        }

    } else {
        header("location:./index.php");
        exit();
    }