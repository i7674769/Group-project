<?php
  session_start();
  session_destroy(); //Session is being destroyed. 
  header('Location: index.php'); //User is redirected to index.php. Because the session is destroyed, the if-statement in index.php will be wrong -> will not be redirected to the post_page but the signup/login_page.
  exit; //Exit logout.php. 
?>
