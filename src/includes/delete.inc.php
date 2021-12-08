<?php
if (isset($_GET['id'])) {
        require_once 'dbh.inc.php';
        require_once 'function.inc.php';
        }

        $id = validate($_GET['id']);

        $sql = "DELETE FROM hikes
                WHERE id=$id";

        $result = mysqli_query($conn, $sql);
        if  ($result) {
            header("Location: ../read.php?sucess=successfully deleted");
            
        }else {
            header("Location: ../read.php?error=unknown error occured&$ user_data");
        }

    else {
        header("Location: .../read.php")
    }*/
    