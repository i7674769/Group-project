<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php if(isset($_SESSION["user"])) {?>

<?php
    if(isset($_GET["id"])){
        $postID = $_GET["id"]; 
            
            if (isset($_POST["new_post"])){
                $new_post = $_POST["new_post"];

                $query = "UPDATE FROM posts WHERE id = '{$postID}' SET post = '{$new_post}'";
                $result = mysqli_query($connect, $query); 
            } else {
                echo "This is not working, Darlene!";
            }
        $new_post = "";
        }
    
    header('Location: index.php');
    exit;
?>
<?php } ?>
