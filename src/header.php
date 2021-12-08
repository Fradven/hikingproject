<?php
require_once('./includes/dbh.inc.php');
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
    <div class="header__container">
    <div class="header__top">
    <div class="header__logo">
    <a href="index.html" class="logo">
    <img src="img/logo_hiking.png" alt="Hiking Project">
    </a>
    </div>

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
    <h1>HIKING</h1>

</div>

</header>    
