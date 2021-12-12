<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $repwd = $_POST["repwd"]; 

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        //check if all input a filled and filter all the inputed  ellement to see if they are clean
        if (emptyInputSignup($name, $email, $pwd, $repwd) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if ($name !== filterdName($name)){
            header("location: ../signup.php?error=invalidusername");
            exit();
        }

        if ($pwd !== filterdPwd($pwd)){
            header("location: ../signup.php?error=invalidpwd");
            exit();
        }

        //match the password to the confirmation
        if (matchRepwd($pwd, $repwd) !== false){
            header("location: ../signup.php?error=pwddontmatch");
            exit();
        }

        //check if email is valid
        if (filterdEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        //check if username is taken
        if(uidExist($conn, $name, $email) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        //send input to the database
        signup($conn, $name, $email, $pwd);

    } else {
        header("location:./index.php");
        exit();
    }