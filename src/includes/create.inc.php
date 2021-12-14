<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $travel = $_POST["travel"];
        $durationhours = $_POST["durationhours"];
        $durationminutes = $_POST["durationminutes"];
        $elevation = $_POST["elevation"]; 
        $difficulty = $_POST["difficulty"]; 

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        if (emptyInputCreat($name, $difficulty, $travel, $durationhours, $durationminutes, $elevation) !== false) {
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

        if (filterdInt($durationhours) !== false){
            header("location: ../create.php?error=invalidduration");
            exit();
        }

        if (filterdInt($durationminutes) !== false){
            header("location: ../create.php?error=invalidduration");
            exit();
        }

        if (filterdInt($elevation) !== false){
            header("location: ../create.php?error=invalidelevation");
            exit();
        }

        createHike($conn, $name, $difficulty, $travel, $durationhours, $durationminutes, $elevation);

    } else {
        header("location:./index.php?error=invalidpath");
        exit();
    }