<?php
    require_once "headersmall.php";
    require_once('./includes/dbh.inc.php');
    $id = $_GET["id"];
    try {
        $stmt = $conn->prepare("SELECT * FROM hikes WHERE id = $id");
        $stmt->execute();
        $hikes = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
        echo "connection Foiled!";
        exit();
    }   
?>
<section class="create">
<div class="create__container">
    <h2 class="create__container__title">Edit the trail</h2>
    <div class="bordure"></div>
    <img class="create__container__img" src="../../img/addhiking.png" img alt="login"/>
    <div class="create__container__ctn">

        <form action="includes/update.inc.php" method="post" >
            <label class="create__container__ctn__label" for="name">Name of the trail: </label><br>
            <input class="create__container__ctn__input" type="text" id="name" name="name" value="<?php echo $hikes['name']; ?>"><br>
            
            <label class="create__container__ctn__label" for="travel">Distance: </label><br>
            <input class="create__container__ctn__input" type="text" id="travel" name="travel" value="<?php echo $hikes['distance']; ?>"><br>
            
            <label class="create__container__ctn__label" for="duration" class="label">Duration : <br/></label>
            <input class="create__container__ctn__input" type="number" name="durationhours" id="hours" value="<?php echo $hikes['hours']; ?>" min="0" style="width: 3rem;">
            <span style="font-size:0.7em;">hours</span>
            <input class="create__container__ctn__input" type="number" name="durationminutes" id="minutes" value="<?php echo $hikes['minutes']; ?>" min="0" max="59" style="width: 3rem;">
            <span style="font-size:0.7em;">minutes</span></br>
            
            <label class="create__container__ctn__label" for="elevation">Elevation Gained: </label><br>
            <input class="create__container__ctn__input" type="text" id="elevation" name="elevation"  value="<?php echo $hikes['elevation_gain']; ?>"><br>

            <label class="create__container__ctn__label" for="difficulty"> Difficulty: </label></br>
            <input type="radio" id="hard" name="difficulty" value="hard">
            <label class="create__container__ctn__difficulty" for="hard">Hard</label><br>

            <input type="radio" id="medium" name="difficulty" value="medium">
            <label class="create__container__ctn__difficulty" for="medium">Medium</label><br>

            <input type="radio" id="easy" name="difficulty" value="easy">
            <label class="create__container__ctn__difficulty" for="easy">Easy</label></br>

            <input class="create__container__ctn__difficulty" type="hidden" name="id" value="<?= $id ?>" />

            <button class="create__container__ctn__button" type="submit" value="submit" name="submit">Submit</button>
        </form>
    </div>
    <?php if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p class='error'>One or all the input fields are empty!</p>";
        }
        elseif ($_GET['error'] == "invalidname") {
            echo "<p class='error'>Unauthorized character detected in the name field!</p>";
        }
        elseif ($_GET['error'] == "invalidDistance") {
            echo "<p class='error'>Unauthorized character detected in the distance field!</p>";
        }
        elseif ($_GET['error'] == "invalidduration") {
            echo "<p class='error'>Unauthorized character detected in the duration field!</p>";
        }
        elseif ($_GET['error'] == "invalidelevation") {
            echo "<p class='error'>Unauthorized character detected in the elevation field!</p>";
        }
        elseif ($_GET['error'] == "invalidpath") {
            echo "<p class='error'>Entered the page through an unauthorized path!</p>";
        }
    }
    ?>
</section>
<footer>
<?php 
include_once 'footer.php';
?>
