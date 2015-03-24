<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["id"])) {
        $postID = $_GET["id"]; 
        $userID = $_SESSION["user_id"];
        
        $query = "DELETE FROM posts WHERE id = '{$postID}' and user_id = '{$_SESSION['user_id']}'";
        $result = mysqli_query($connect, $query); 

    } else {
        echo "Problem, your post can currently not be deleted!";
    }
    header('Location: index.php');
    exit;
?>

