<?php
include ('./includes/dbh.inc.php');
$allhikes = $conn->query('SELECT * FROM hikes ORDER BY id DESC');
if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allhikes = $conn->query('SELECT name FROM hikes WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC'
);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/main.css">
    <title>Hiking project</title>
</head>
</div>
<footer>

</div>
    <h1>fOOIKING</h1>

</div>

</footer>    
</body>