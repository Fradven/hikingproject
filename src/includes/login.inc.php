<?php

    if (isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';
        require_once 'function.inc.php';

        //check if all input a filled and filter all the inputed  ellement to see if they are clean
        if (emptyInputLogin($name, $pwd) !== false) {
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

        //send input to the database
        login($conn, $name, $pwd);

    } else {
        header("location:../login.php?error=invalidaccess");
        exit();
    }