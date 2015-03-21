<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["id"])) {
        $userID = $_GET["id"]; 
        $query = "DELETE FROM posts WHERE user_id = '{$userID}' LIMIT 1";
        $result = mysqli_query($connect, $query); 

    } else {
        echo "Problem, your post can currently not be deleted!";
    }
    header('Location: index.php');
    exit;
?>

