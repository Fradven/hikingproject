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

<!-- MENU HAMBURGER -->
<div class="menuWrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger">
        <div></div>
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
                    <li><a href="signup.php">New account</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="create.php">Logout</a></li>
                    </ul>
                
            </div>
        </div>
    </div>
</div>

<header class="headersmall">
<div class="headersmall__container">
    
<nav class="menu">
    <ul class="headersmall__container__logo">
    <a href="index.php">
        <img src="img/logo_hiking.png" alt="Hiking Project">
    </a>
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
    <?php
    if (isset ($_SESSION ["userId"])) {
        echo
        
        '<li class="newhike"> 
        <a href="create.php">Add a new Hike</a>
        </li>
        <li class="logout">
        <a href="./includes/logout.inc.php">
            <img src="img/login.png" alt="login">
        </a>
    </li>';
      }
      else {
        echo
        '<li class="login">
        <a href="login.php">
            <img src="img/login.png" alt="login">
        </a>
    </li>';
      }
    ?>


    </ul>
</nav>
</div>
 
