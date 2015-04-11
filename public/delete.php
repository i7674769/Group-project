<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["id"])) {
        $userID = $_GET["id"]; //Get the user_id (see index.php file where the session user_id was put into the URL).
        $query = "DELETE FROM users WHERE id = '{$userID}'"; //Query to delete the user who has the same Id as the the session user_id (user who is logged in).
        $result = mysqli_query($connect, $query); 

    } else {
        echo '<script type="text/javascript" language="Javascript">  
        alert("Your account can not be deleted.") 
        </script>'; //In case some error occures, this message is echoed out in an alert window using js. 
    }

    header('Location: logout.php');
    exit; //Redirect to logout.php so the user is automatically being logged out after the account has been deleted and cannot read any more posts.
?>
