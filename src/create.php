<?php
    include_once 'header.php';
?>
<section class="create">
    <h2 class="create__title">Add a new trail</h2>

    <div class="create__ctn">

        <form action="includes/create.inc.php" method="post" >
            <label for="name">Name of the trail: </label><br>
            <input type="text" id="name" name="name" placeholder="Enter name..."><br>
            
            <label for="travel">Distance: </label><br>
            <input type="text" id="travel" name="travel" placeholder="In kilometers..."><br>
            
            <label for="duration">Duration: </label><br>
            <input type="text" id="duration" name="duration"  placeholder="In 00h00..."><br>
            
            <label for="elevation">Elevation Gained: </label><br>
            <input type="text" id="elevation" name="elevation"  placeholder="In meters..."><br>

            <label for="difficulty"> Difficulty: </label></br>
            <input type="radio" id="hard" name="difficulty" value="hard">
            <label for="hard">Hard</label><br>

            <input type="radio" id="medium" name="difficulty" value="medium">
            <label for="medium">Medium</label><br>

            <input type="radio" id="easy" name="difficulty" value="easy">
            <label for="easy">Easy</label></br>

            <button type="submit" value="submit" name="submit">Submit</button>
        </form>
    </div>
</section>