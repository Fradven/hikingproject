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
</section>