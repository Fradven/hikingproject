<?php 
  require_once ('header.php');
  require_once('./includes/dbh.inc.php');
  try{
  $stmt = $conn->prepare("SELECT * FROM hikes");
  $stmt->execute();
  $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "connection Foiled!";
  exit();}
  $difficulties = ['easy', 'moderate', 'hard'];
?>


  <?php
    foreach ($hikes as $hike) {
      echo '
      <div class="card">
        <h2 class="card__name">'.$hike['name'].'</h2>

        <div class="card__difficulty">
          <p>'.$difficulties[$hike['difficulty']].'</p>
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
          <button class="card__btn delete"><a href=php/delete.php?ID='.$hike['id'].'>DELETE</a></button>
          <button class="card__btn modify"><a href=php/update.php?ID='.$hike['id'].'>EDIT</a></button>
        </div>
      </div>
      ';
      }
    ?>


</body>
</html>