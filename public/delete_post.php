<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["id"])) {
        $postID = $_GET["id"]; //Get the post_id (see box2.php file where the post_id was put into the URL).
        $userID = $_SESSION["user_id"]; //Get the user_id from session (previously saved as session variable).
        
        $query = "DELETE FROM posts WHERE id = '{$postID}' and user_id = '{$_SESSION['user_id']}'"; //Query to delete only the selected post made by the user logged in. This also enables users from deleting any posts that are not theirs as well as all the posts from one user at the same time. 
        $result = mysqli_query($connect, $query); 

    } else {
        echo '<script type="text/javascript" language="Javascript">  
        alert("Your account can not be deleted.") 
        </script>'; //In case some error occures, this message is echoed out in an alert window using js. 
    }
    header('Location: index.php');
    exit; //Redirecting to index.php.
?>

