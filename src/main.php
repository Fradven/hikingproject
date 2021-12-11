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
        <?php
            if($allhikes->rowCount() > 0){
                while($hikes = $allhikes->fetch()){
                    ?>
                <div class="card">
        <h2 class="card__name"><?= $hikes['name']?></h2>

        <div class="card__bordure"></div>
                
        <div class="card__difficulty">
            <p class="card__difficulty__theme">Difficulty</p>
          <p><?= $hikes['difficulty']?></p>
        </div>

        <div class="card__distance">
        <p class="card__distance__theme">Distance</p>
          <p><?= $hikes['distance']?> km</p>
        </div>

        <div class="card__duration">
        <p class="card__duration__theme">Duration</p>
          <p><?= $hikes['duration']?></p>
        </div>

        <div class="card__elevation">
        <p class="card__elevation__theme">Elevation</p>
          <p><?= $hikes['elevation_gain']?> m</p>
        </div>
      
        <div class="card__ctn-btn">
          <form method="post" action="delete.php?id='.$hike['id'].'">
          <input type="submit" class="card__btn delete" value="DELETE"> 
          </form>
          <button class="card__btn modify"><a href=php/update.php?id='.$hike['id'].'>EDIT</a></button>
        </div>
      </div>
                    <?php
                }
            }else{
                ?>
                <div class="no_trails_found">
                <p class="no_trails_found__txt">You're lost ? <br><span>No trails found...</span></p>
                </div>
                <?php
            }
        ?>
    </div>
    </section>
