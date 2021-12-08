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

    function createUser($conn, $name, $difficulty, $travel, $duration, $elevation) {
        try {

            $sql = $conn->prepare("INSERT INTO hikes (name, difficulty, distance, duration, elevation_gain) VALUES (:name, :difficulty, :distance, :duration, :elevation_gain)");
            $sql->bindParam(':name', $name, PDO::PARAM_STR, 55);
            $sql->bindParam(':difficulty', $difficulty, PDO::PARAM_STR, 11);
            $sql->bindParam(':distance', $travel, PDO::PARAM_STR, 50);
            $sql->bindParam(':duration', $duration, PDO::PARAM_STR, 50);
            $sql->bindParam(':elevation_gain', $elevation, PDO::PARAM_INT);
            $sql->execute();
               
            header("location: ../create.php?success");
            exit();
        } catch(PDOException $e) {
            header("location: ../create.php?error=invalid");
            exit();
          }
    }

