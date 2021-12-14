<?php
    //check for empty form in create
    function emptyInputCreat($name, $travel, $durationhours, $durationminutes, $elevation, $difficulty) {
        $result;
        if (empty($name)  || empty($travel)  || empty($durationhours)  || empty($durationminutes)  || empty($elevation)  || empty($difficulty)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //check for empty form in signup
    function emptyInputSignup($name, $email, $pwd, $repwd) {
        $result;
        if (empty($name)  || empty($email)  || empty($pwd)  || empty($repwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //check for empty form in login
    function emptyInputLogin($name, $pwd) {
        $result;
        if (empty($name)  || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //filter for different page to see if there are no code injection
    function filterdName($name) {
        $newstr = filter_var($name, FILTER_SANITIZE_STRING);
        return $newstr;
    }

    //filter the signup and login password
    function filterdPwd($pwd) {
        $newstr = filter_var($pwd, FILTER_SANITIZE_STRING);
        return $newstr;
    }

    //check if password matches the confirmation
    function matchRepwd($pwd, $repwd) {
        $result;
        if($pwd !== $repwd){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
    
    //filter the email
    function filterdEmail($email) {
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
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

    function filterdInt($int) {
        $result;
        if(!$newInt = filter_var($int, FILTER_VALIDATE_INT)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //check if either the username or email are in the database
    function uidExist($conn, $name, $email) {
        try {
        $sql = $conn->prepare("SELECT * FROM user WHERE userName = :userName OR userEmail = :userEmail");
        $sql->bindParam(':userName', $name, PDO::PARAM_STR, 45);
        $sql->bindParam(':userEmail', $email, PDO::PARAM_STR, 45);
        $sql->execute();
        $userData = $sql->fetch(PDO::FETCH_ASSOC);
        
        $result;

        if ($userData) {
            $result = true;
            return $result;
        } else {
            $result = false;
            return $result;
        }

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
    }}

    //deletea hike from database
    function deleteUser($id){
        try {
            $conn = getDatabaseConnexion();
            $requete= "DELETE from hikes where id = '$id' ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //Input data from the create page to the database
    function createHike($conn, $name, $difficulty, $travel, $durationhours, $durationminutes, $elevation) {
        try {

            $sql = $conn->prepare(
                "INSERT INTO hikes (name, difficulty, distance, hours, minutes, elevation_gain) 
                VALUES (:name, :difficulty, :distance, :hours, :minutes, :elevation_gain)");

            $sql->bindParam(':name', $name, PDO::PARAM_STR, 55);
            $sql->bindParam(':difficulty', $difficulty, PDO::PARAM_STR, 11);
            $sql->bindParam(':distance', $travel, PDO::PARAM_STR);
            $sql->bindParam(':hours', $durationhours, PDO::PARAM_INT);
            $sql->bindParam(':minutes', $durationminutes, PDO::PARAM_INT);
            $sql->bindParam(':elevation_gain', $elevation, PDO::PARAM_INT);
            $sql->execute();

            header("location: ../create.php?success");
            exit();
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        }
    
    
        
    //Update data in the database
    function updateHike($conn, $id, $name, $difficulty, $travel, $durationhours, $durationminutes, $elevation) {
        try {

            $sql = $conn->prepare(
            "UPDATE hikes
            SET name = :name,
            difficulty = :difficulty,
            distance = :distance,
            hours = :hours,
            minutes = :minutes,
            elevation_gain = :elevation_gain
            WHERE id = :id");

            $sql->bindParam(':name', $name, PDO::PARAM_STR, 55);
            $sql->bindParam(':difficulty', $difficulty, PDO::PARAM_STR, 11);
            $sql->bindParam(':distance', $travel, PDO::PARAM_STR);
            $sql->bindParam(':hours', $durationhours, PDO::PARAM_INT);
            $sql->bindParam(':minutes', $durationminutes, PDO::PARAM_INT);
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

    //signup the user
    function signup($conn, $name, $email, $pwd) {
        try {
        $sql = $conn->prepare(
            "INSERT INTO user (userName, userEmail, userPwd) 
            VALUES (:userName, :userEmail, :userPwd)");
        $sql->bindParam(':userName', $name, PDO::PARAM_STR, 45);
        $sql->bindParam(':userEmail', $email, PDO::PARAM_STR, 45);

        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql->bindParam(':userPwd', $hashPwd, PDO::PARAM_STR, 255);
        $sql->execute();

        header("location: ../index.php?success");
        exit();

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
    }}

    //login the user
    function login($conn, $name, $pwd) {
        $uidExist = uidExist($conn, $name, $name);


        if ($uidExist === false) {
            header("location: ../login.php?error=wrongusername");
            exit();
        }

        try {
            $sql = $conn->prepare("SELECT * FROM user WHERE userName = :userName OR userEmail = :userEmail");
            $sql->bindParam(':userName', $name, PDO::PARAM_STR, 45);
            $sql->bindParam(':userEmail', $name, PDO::PARAM_STR, 45);
            $sql->execute();
            $userInfo = $sql->fetch(PDO::FETCH_ASSOC);

            $checkPwd = password_verify($pwd, $userInfo['userPwd']);
            if ($checkPwd === false) {
                header("location: ../login.php?error=wrongpwd");
                exit();
            }
            else if ($checkPwd === true) {
                session_start();
                $_SESSION["userId"] = $userInfo["userId"];
                header("location: ../index.php");
                exit();
            }
              
            } catch(PDOException $e) {
                echo $e->getMessage();
                exit();
        }
    }

