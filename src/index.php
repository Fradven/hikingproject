<?php 
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiking Project</title>
</head>
<body>
  <?php
    foreach ($hikes as $hike) {
      echo '
      <div class="card">
          <p class="name">'.$hike['name'].'</p>
          <p class="difficulty">'.$difficulties[$hike['difficulty']].'</p>
          <p class="distance">'.$hike['distance'].'</p>
          <p class="duration">'.$hike['duration'].'</p>
          <p class="elevation">'.$hike['elevation'].'</p>
          <p class="delete"><button>DEL</button></p>
          <p class="modify"><a href=php/update.php?ID='.$hike['ID'].'>MOD</a></p>
      </div>
      ';
      }
    ?>

</body>
</html>