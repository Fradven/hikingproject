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
          <p><?= $hikes['hours']?>h<?= $hikes['minutes']?></p>
        </div>

        <div class="card__elevation">
        <p class="card__elevation__theme">Elevation</p>
          <p><?= $hikes['elevation_gain']?> m</p>
        </div>

        <div class="card__createtime">
          <p><?= $hikes['createAt'] ?></p>
        </div>
      
        <div class="card__ctn-btn">
          <form method="post" action="delete.php?id=<?= $hikes['id']?>">
          <input type="submit" class="card__btn delete" value="DELETE"> 
          </form>
          <button class="card__btn modify"><a href="update.php?id=<?= $hikes['id']?>">EDIT</a></button>
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
    <section class="pictures">
        <img class="img" src="img/hiking1.jpg" alt="hiking1" />
        <img class="img" src="img/hiking2.jpg" alt="hiking2" />
        <img class="img" src="img/hiking3.jpg" alt="hiking3" />
        <img class="img" src="img/hiking4.jpg" alt="hiking4" />
      </section>
    </section>
