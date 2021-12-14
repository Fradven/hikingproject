<?php
    include_once 'header.php';
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
</section>