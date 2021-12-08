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

    function filterdName($name) {
        $newstr = filter_var($name, FILTER_SANITIZE_STRING);
        return $newstr;
    }

    function filterdDistance($travel) {
        $result;
        if(!$newfloat = filter_var($travel, FILTER_VALIDATE_FLOAT)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function filterdDuration($duration) {
        $newstr = filter_var($duration, FILTER_SANITIZE_STRING);
        return $newstr;
    }

    function filterdElevation($elevation) {
        $result;
        if(!$newInt = filter_var($elevation, FILTER_VALIDATE_INT)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    //check if the name has been inputed had valid character
    function invalidName($name) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9._-]$/", $name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //Input data from the create page to the database
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

    //Input data from the create page to the database
    function updateHike($conn, $id, $name, $difficulty, $travel, $duration, $elevation) {
        try {

            $sql = $conn->prepare(
            "UPDATE hikes
            SET name = :name,
            difficulty = :difficulty,
            distance = :distance,
            duration = :duration,
            elevation_gain = :elevation_gain
            WHERE id = :id");

            $sql->bindParam(':name', $name, PDO::PARAM_STR, 55);
            $sql->bindParam(':difficulty', $difficulty, PDO::PARAM_STR, 11);
            $sql->bindParam(':distance', $travel, PDO::PARAM_STR, 50);
            $sql->bindParam(':duration', $duration, PDO::PARAM_STR, 50);
            $sql->bindParam(':elevation_gain', $elevation, PDO::PARAM_INT);
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
               
            header("location: ../index.php?success");
            exit();
        } catch(PDOException $e) {
            echo $e->getMessage();

            exit();
          }
    }

