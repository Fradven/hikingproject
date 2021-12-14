<?php
    include_once 'headersmall.php';
?>
<section class="create">
<div class="create__container">
    <h2 class="create__container__title">Add a new hike</h2>
    <div class="bordure"></div>
    <img class="create__container__img" src="../../img/addhiking.png" img alt="login"/>
    <div class="create__container__ctn">

        <form action="includes/create.inc.php" method="post" >
            <label class="create__container__ctn__label" for="name">Name of the trail: </label><br>
            <input class="create__container__ctn__input" type="text" id="name" name="name" placeholder="Enter name..."><br>
            
            <label class="create__container__ctn__label" for="travel">Distance: </label><br>
            <input class="create__container__ctn__input" type="text" id="travel" name="travel" placeholder="In kilometers..."><br>
            
            <label class="create__container__ctn__label" for="duration">Duration: </label><br>
            <input class="create__container__ctn__input" type="text" id="duration" name="duration"  placeholder="In 00h00..."><br>
            
            <label class="create__container__ctn__label" for="elevation">Elevation Gained: </label><br>
            <input class="create__container__ctn__input" type="text" id="elevation" name="elevation"  placeholder="In meters..."><br>

            <label class="create__container__ctn__label" for="difficulty"> Difficulty: </label></br>
            <input type="radio" id="hard" name="difficulty" value="hard">
            <label class="create__container__ctn__difficulty" for="hard">Hard</label><br>

            <input type="radio" id="medium" name="difficulty" value="medium">
            <label class="create__container__ctn__difficulty" for="medium">Medium</label><br>

            <input type="radio" id="easy" name="difficulty" value="easy">
            <label class="create__container__ctn__difficulty" for="easy">Easy</label></br>

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