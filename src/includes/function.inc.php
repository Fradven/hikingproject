<?php
    //check for empty form
    function emptyInputCreat($name, $travel, $duration, $elevation, $difficulty) {
        $result;
        if (empty($name)  || empty($travel)  || empty($duration)  || empty($elevation)  || empty($difficulty)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //check if the name has been inputed already
    /* function invalidName($name) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    } */

    //check if distance is a float
/*     function invalidTravel($travel) {
        $result;
        if (empty($name)  || empty($travel)  || empty($duration)  || empty($elevation)  || empty($difficulty)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    } */

    function createUser($conn, $name, $travel, $duration, $elevation, $difficulty) {
        $sql = "INSERT INTO hikes (name, difficulty, distance, duration, elevation_gain) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../create.php?error=stmterror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, 'sssis', $name, $travel, $duration, $elevation, $difficulty);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../create.php?success");
        exit();
    }