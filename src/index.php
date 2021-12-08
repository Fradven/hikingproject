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
  <?php echo '<a href="create.php">New Hike</a>' ?>
  
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
          <button calsss="card__btn delete">DELETE</button>
          <button class="card__btn modify"><a href=php/update.php?ID='.$hike['id'].'>EDIT</a></button>
        </div>
      </div>
      ';
      }
    ?>

</body>
</html>