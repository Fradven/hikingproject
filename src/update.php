<?php
    require_once "header.php";
    require_once('./includes/dbh.inc.php');
    $id = $_GET ["id"];
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
    <h2 class="create__title">Edit the trail</h2>

    <div class="create__ctn">

        <form action="includes/update.inc.php" method="post" >
            <label for="name">Name of the trail: </label><br>
            <input type="text" id="name" name="name" value="<?php echo $hikes['name']; ?>"><br>
            
            <label for="travel">Distance: </label><br>
            <input type="text" id="travel" name="travel" value="<?php echo $hikes['distance']; ?>"><br>
            
            <label for="duration">Duration: </label><br>
            <input type="text" id="duration" name="duration"  value="<?php echo $hikes['duration']; ?>"><br>
            
            <label for="elevation">Elevation Gained: </label><br>
            <input type="text" id="elevation" name="elevation"  value="<?php echo $hikes['elevation_gain']; ?>"><br>

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