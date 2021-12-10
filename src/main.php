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
                </div>
        <div class="card__difficulty">
          <p><?= $hikes['difficulty']?></p>
        </div>

        <div class="card__distance">
          <p><?= $hikes['distance']?></p>
        </div>

        <div class="card__duration">
          <p><?= $hikes['duration']?></p>
        </div>

        <div class="card__elevation">
          <p><?= $hikes['elevation_gain']?></p>
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
                <p>No trails found</p>
                <?php
            }
        ?>
    </section>
<footer>