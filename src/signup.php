<?php
    include_once 'header.php';
?>
<section class="create">
    <h2 class="create__title">Sign Up!</h2>

    <div class="create__ctn">

        <form action="includes/signup.inc.php" method="post" >
            <label for="name">Enter a Username: </label><br>
            <input type="text" id="name" name="name" placeholder="Username..."><br>
            
            <label for="email">Enter an Email: </label><br>
            <input type="text" id="email" name="email" placeholder="email@gmail.com..."><br>
            
            <label for="pwd">Enter a Password: </label><br>
            <input type="password" id="pwd" name="pwd"><br>
            
            <label for="repwd">Confirm Password: </label><br>
            <input type="password" id="repwd" name="repwd"><br>

            <button type="submit" value="submit" name="submit">Submit</button>

        </form>
    </div>
</section>