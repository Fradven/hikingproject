<?php
try{
  $stmt = $conn->prepare("SELECT * FROM hikes");
  $stmt->execute();
  $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "connection Failed!";
  exit();}
  $difficulties = ['easy', 'moderate', 'hard'];
?>


    <section class="afficher_hikes">
        <div class="container">
        <?php
            if($allhikes->rowCount() > 0){
                while($hikes = $allhikes->fetch()){
                    ?>
                <div class="card">
        <h2 class="card__name"><?= $hikes['name']?></h2>
                </div>
        <div class="card__difficulty">
          <p>Level - <?= $hikes['difficulty']?></p>
        </div>

        <div class="card__distance">
          <p>Distance - <?= $hikes['distance']?> km</p>
        </div>

        <div class="card__duration">
          <p>Duration - <?= $hikes['duration']?></p>
        </div>

        <div class="card__elevation">
          <p>Elevation - <?= $hikes['elevation_gain']?> m</p>
        </div>
      
        <div class="card__ctn-btn">
          <form method="post" action="delete.php?id='.$hike['id'].'">
          <input type="submit" class="card__btn delete" value="DELETE"> 
          </form>

          <?php echo 
            '<button class="card__btn modify"><a href="update.php?id='.$hikes['id'].'">Edit</a></button>' 
          ?>
          
        </div>
      </div>
                    <?php
                }
            }else{
                ?>
                <p>No trails found</p>
                <?php
            }
        ?>
        </div>
    </section>
