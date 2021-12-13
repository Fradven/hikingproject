<?php
    include_once 'header.php';
?>
<section class="create">
    <h2 class="create__title">Login</h2>

    <div class="create__ctn">

        <form action="includes/login.inc.php" method="post" >
            <label for="name">Enter your Username or Email: </label><br>
            <input type="text" id="name" name="name" placeholder="Username/email@gmail.com..."><br>
            
            <label for="pwd">Enter your Password: </label><br>
            <input type="password" id="pwd" name="pwd" placeholder="Password..."><br>

            <button type="submit" value="submit" name="submit">Login</button>

        </form>
    </div>

    <?php if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p class='error'>One or both the input field are empty!</p>";
        }
        elseif ($_GET['error'] == "invalidusername") {
            echo "<p class='error'>Unauthorized character detected in the username field!</p>";
        }
        elseif ($_GET['error'] == "invalidpwd") {
            echo "<p class='error'>Unauthorized character detected in the password field!</p>";
        }
        elseif ($_GET['error'] == "invalidaccess") {
            echo "<p class='error'>Entered the page through an unauthorized path!</p>";
        }
        elseif ($_GET['error'] == "wrongusername") {
            echo "<p class='error'>Username doesnt exist!</p>";
        }
        elseif ($_GET['error'] == "wrongpwd") {
            echo "<p class='error'>Wrong password!</p>";
        }
    }
    ?>
</section>