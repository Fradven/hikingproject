<?php
session_start();
include ('./includes/dbh.inc.php');
$allhikes = $conn->query('SELECT * FROM hikes ORDER BY id DESC');
if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allhikes = $conn->query('SELECT * FROM hikes WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC'
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
<body>

<header class="header">
<div class="header__container">
    
<div class="menu">
    <div class="header__container__logo">
    <a href="index.php">
        <img src="img/logo_hiking.png" alt="Hiking Project">
</a>
    </div>
    <div class="menu">
        <div>
            <div>
            <li class ="recherche">
<form class ="recherche__form" method="GET">
    <div class ="recherche__search">
        <input  type="search" name="s" placeholder="Search a hike..."></div>
    <div class ="recherche__submit">
        <input type="submit" name="Send" value ="🔎"></div>
    </form>
</li>
                <ul>
                    <li><a href="create.php">Add a new Hike</a></li>
                    <li><a href="create.php">New account</a></li>
                    <li><a href="create.php">Login</a></li>
                    <li><a href="create.php">Logout</a></li>
                    </ul>
                
            </div>
        </div>
    </div>
</div>

<header class="header">
<div class="header__container">
    
<nav class="menu">
    <ul class="header__container__logo">
    <img src="img/logo_hiking.png" alt="Hiking Project" href="index.php">
    </ul>

    <ul class="top">

    <li class ="recherche">
<form class ="recherche__form" method="GET">
    <div class ="recherche__search">
        <input  type="search" name="s" placeholder="Search a hike..."></div>
    <div class ="recherche__submit">
        <input type="submit" name="Send" value ="🔎"></div>
    </form>
</li>
        <li class="newhike">
    <?php echo 
    '<a class="newhike" href="signup.php">New account</a>' 
    ?>
<?php
if (isset($_SESSION["userId"])) {
    echo '<div class="login">
    <a href="./includes/logout.inc.php">
        <img src="img/login.png" alt="logout">
    </a>
</div>';
} else {echo
    '<div class="login">
    <a href="login.php">
    <img src="img/login.png" alt="login">
    </a>
    </div>';
}
?>
    </div>
</div>
    
    <div class="title">
    <h1>HIKING PROJECT</h1>
    </div> 

</div>
 
