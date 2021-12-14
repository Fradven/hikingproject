<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $travel = $_POST["travel"];
        $duration = $_POST["duration"];
        $elevation = $_POST["elevation"]; 
        $difficulty = $_POST["difficulty"]; 

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        if (emptyInputCreat($name, $difficulty, $travel, $duration, $elevation) !== false) {
            header("location: ../create.php?error=emptyinput");
            exit();
        }

        if ($name !== filterdName($name)){
            header("location: ../create.php?error=invalidname");
            exit();
        }

        if (filterdDistance($travel) !== false){
            header("location: ../create.php?error=invalidDistance");
            exit();
        }

        if ($duration !== filterdDuration($duration)){
            header("location: ../create.php?error=invalidduration");
            exit();
        }

        if (filterdDistance($elevation) !== false){
            header("location: ../create.php?error=invalidelevation");
            exit();
        }

        /* if (invalidTravel($travel) !== false){
            header("location: ../create.php?error=invalidname");
            exit();
        } */

        createUser($conn, $name, $difficulty, $travel, $duration, $elevation);

    } else {
        header("location:./index.php?error=invalidpath");
        exit();
    }