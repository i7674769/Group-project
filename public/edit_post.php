<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php if(isset($_SESSION["user"])) {?>
    <form>
        New post: <input type="text" name="new_tweet" value="" />
        <input type="submit" name="new_post" value="Submit" />
    </form>


<?php
    if(isset($_GET["id"])){
        $postID = $_GET["id"]; 
            
            if (isset($_POST["new_post"])){
                $new_tweet = $_POST["new_tweet"];

                $query = "DELETE FROM posts WHERE id = '{$postID}' and user_id = '{$_SESSION['user_id']}'";
                $result = mysqli_query($connect, $query); 
            } else {
                echo "This is not working, Darlene!";
            }
        $new_tweet = "";
        }
?>
<?php } ?>

