<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $travel = $_POST["travel"];
        $duration = $_POST["duration"];
        $elevation = $_POST["elevation"]; 
        $difficulty = $_POST["difficulty"]; 
        $id = $_POST["id"];

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        if (emptyInputCreat($name, $difficulty, $travel, $duration, $elevation) !== false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if ($name !== filterdName($name)){
            header("location: ../index.php?error=invalidname");
            exit();
        }

        if (filterdDistance($travel) !== false){
            header("location: ../index.php?error=invalidDistance");
            exit();
        }

        if ($duration !== filterdDuration($duration)){
            header("location: ../index.php?error=invalidduration");
            exit();
        }

        if (filterdDistance($elevation) !== false){
            header("location: ../index.php?error=invalidelevation");
            exit();
        }

        /* if (invalidTravel($travel) !== false){
            header("location: ../index.php?error=invalidname");
            exit();
        } */

        updateHike($conn, $id, $name, $difficulty, $travel, $duration, $elevation);

    } else {
        header("location:./index.php?error=invalidpath");
        exit();
    }