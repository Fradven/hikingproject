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
          <p class="name">'.$hike['name'].'</p>
          <p class="difficulty">'.$difficulties[$hike['difficulty']].'</p>
          <p class="distance">'.$hike['distance'].'</p>
          <p class="duration">'.$hike['duration'].'</p>
          <p class="elevation">'.$hike['elevation_gain'].'</p>
          <p class="delete"><button>DEL</button></p>
          <p class="modify"><a href=php/update.php?ID='.$hike['id'].'>MOD</a></p>
      </div>
      ';
      }
    ?>


</body>
</html>