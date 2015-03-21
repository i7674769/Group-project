<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php if(isset($_SESSION["user"])) {?>
    <form>
        New post: <input type="text" name="new_tweet" value="" />
        <input type="submit" name="submit" value="Submit" />
    </form>
<?php } ?>

<?php
    if(isset($_POST["signup"])
      or (isset($_GET["id"]))
      ) {
        $userID = $_GET["id"]; 
        $new_tweet = $_POST["new_tweet"];
        
        $query = "UPDATE posts SET tweet='$new_tweet' WHERE user_id = '{$userID}'";
        $result = mysqli_query($connect, $query); 
      }
$new_tweet = "";

?>
