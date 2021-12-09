<?php
try{
  $stmt = $conn->prepare("SELECT * FROM hikes");
  $stmt->execute();
  $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "connection Foiled!";
  exit();}
  $difficulties = ['easy', 'moderate', 'hard'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/main.css">
    <title>Hoking project</title>
</head>
</header>
<div class="main">
  <?php
    foreach ($hikes as $hike) {
      echo '
      <div class="card">
        <h2 class="card__name">'.$hike['name'].'</h2>

        <div class="card__difficulty">
          <p>'.$hike['difficulty'].'</p>
        </div>

        <div class="card__distance">
          <p>'.$hike['distance'].'</p>
        </div>

        <div class="card__duration">
          <p>'.$hike['duration'].'</p>
        </div>

        <div class="card__elevation">
          <p>'.$hike['elevation_gain'].'</p>
        </div>
      
        <div class="card__ctn-btn">
          <form method="post" action="delete.php?id='.$hike['id'].'">
          <input type="submit" class="card__btn delete" value="DELETE"> 
          </form>
          <button class="card__btn modify"><a href=php/update.php?id='.$hike['id'].'>EDIT</a></button>
        </div>
      </div>
      ';
    }
    ?>
</div>
<footer>