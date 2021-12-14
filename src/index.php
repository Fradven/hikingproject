<?php 
  include('./includes/dbh.inc.php');
  include('header.php');
  if (isset ($_SESSION ["userId"])) {
    include('main.php');
  }
  else {
    include('signup.php');
  }
  
  include('footer.php');
