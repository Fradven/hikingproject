<?php
    include_once 'headersmall.php';
?>
<section class="create">
<div class="create__container">
    <h2 class="create__container__title">Welcome</h2>
    <div class="bordure"></div>
    <img class="create__container__img" src="../../img/login_2.png" img alt="login"/>
    <div class="create__container__ctn">
    <h2 class="create__container__ctn__title">Sign up</h2>
        <form action="includes/signup.inc.php" method="post" >
            <label class="create__container__ctn__label" for="name">Enter a Username: </label><br>
            <input class="create__container__ctn__input" type="text" id="name" name="name" placeholder="Username..."><br>
            
            <label class="create__container__ctn__label" for="email">Enter an Email: </label><br>
            <input class="create__container__ctn__input" type="text" id="email" name="email" placeholder="email@gmail.com..."><br>
            
            <label class="create__container__ctn__label" for="pwd">Enter a Password: </label><br>
            <input class="create__container__ctn__input" type="password" id="pwd" name="pwd"><br>
            
            <label class="create__container__ctn__label" for="repwd">Confirm Password: </label><br>
            <input class="create__container__ctn__input" type="password" id="repwd" name="repwd"><br>

            <button class="create__container__ctn__button" type="submit" value="submit" name="submit">Submit</button>

        </form>
    </div>
</div>
    <?php if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p class='error'>One or all the input fields are empty!</p>";
        }
        elseif ($_GET['error'] == "invalidusername") {
            echo "<p class='error'>Unauthorized character detected in the username field!</p>";
        }
        elseif ($_GET['error'] == "invalidpwd") {
            echo "<p class='error'>Unauthorized character detected in the password field!</p>";
        }
        elseif ($_GET['error'] == "pwddontmatch") {
            echo "<p class='error'>Passwords don't match!</p>";
        }
        elseif ($_GET['error'] == "invalidemail") {
            echo "<p class='error'>Email already in use!</p>";
        }
        elseif ($_GET['error'] == "usernametaken") {
            echo "<p class='error'>Username taken!</p>";
        }
    }
    ?>
</section>
<footer>
<?php 
include_once 'footer.php';
?>