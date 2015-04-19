<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "rhughes"); 
    define("DB_PASS", "9WPq7dKgU+U="); //9WPq7dKgU+U=
    define("DB_NAME", "rhughes"); 

    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno()) { 
        die("Database connection failed: " .
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
        );
    }
?>

