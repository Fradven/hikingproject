<?php
    include_once 'headersmall.php';
?>
<section class="create">
<div class="create__container">
    <h2 class="create__container__title">Welcome back</h2>
    <div class="bordure"></div>
    <img class="create__container__img" src="../../img/login_2.png" img alt="login"/>
    <div class="create__container__ctn">
    <h2 class="create__container__ctn__title">Login</h2>
        <form action="includes/login.inc.php" method="post" >
            <label class="create__container__ctn__label" for="name">Enter your Username or Email: </label><br>
            <input class="create__container__ctn__input" type="text" id="name" name="name" placeholder="Username/email@gmail.com..."><br>
            
            <label class="create__container__ctn__label" for="pwd">Enter your Password: </label><br>
            <input class="create__container__ctn__input" type="password" id="pwd" name="pwd"><br>

            <button class="create__container__ctn__button" type="submit" value="submit" name="submit">Login</button>

        </form>
    </div>
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
<footer>
<?php 
include_once 'footer.php';
?>