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
<body>

<header class="header">

    <div class="custom-shape-divider-top-1639046411">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
    </div>

    <div class="header__container">
    <div class="header__logo">
    <img src="img/logo_hiking.png" alt="Hiking Project">
    </div>

    <div class="title">
    <h1>HIKING PROJECT</h1>
    </div>

    <?php echo 
    '<a href="create.php">New Hike</a>' 
    ?>
    

    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher un hiking">
        <input type="submit" name="Envoyé">
    </form>

    <section class="afficher_hikes">
        <?php
            if($allhikes->rowCount() > 0){
                while($hikes = $allhikes->fetch()){
                    ?>
                    <p><?= $hikes['name']; ?></p>
                    <?php
                }
            }else{
                ?>
                <p>No trails found</p>
                <?php

            }
        ?>
        
    </section>

</div>
 
