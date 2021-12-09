<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $repwd = $_POST["repwd"]; 

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        if (emptyInputSignup($name, $email, $pwd, $repwd) !== false) {
            header("location: ../create.php?error=emptyinput");
            exit();
        }

        if ($name !== filterdName($name)){
            header("location: ../create.php?error=invalidname");
            exit();
        }

        if (filterdEmail($email) !== false){
            header("location: ../create.php?error=invalidDistance");
            exit();
        }

        signup($conn, $email, $pwd, $repwd);

    } else {
        header("location:./index.php");
        exit();
    }