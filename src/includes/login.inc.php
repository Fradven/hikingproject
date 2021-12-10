<?php

    if (isset($_POST["login"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        //check if all input a filled and filter all the inputed  ellement to see if they are clean
        if (emptyInputSignup($name, $email, $pwd) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        if ($name !== filterdName($name)){
            header("location: ../login.php?error=invalidusername");
            exit();
        }

        if ($pwd !== filterdPwd($pwd)){
            header("location: ../login.php?error=invalidpwd");
            exit();
        }

        //check if email is valid
        if (filterdEmail($email) !== false){
            header("location: ../login.php?error=invalidemail");
            exit();
        }

        //send input to the database
        login($conn, $name, $email, $pwd);

    } else {
        header("location:./index.php");
        exit();
    }