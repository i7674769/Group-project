<!--An if-statement is used here to make sure the following content is only displayed once the session has started.-->
<?php if(isset($_SESSION["user"])) {?> 
    <div class="box_post2">
<?php
    include_once("../includes/functions.php"); // Include the functions.php file.
    $timeAgoObject = new convertToAgo; // Create an object for the time conversion functions.
    $ts = $row["dateofpost"]; // Query your database here and get timestamp.
    $convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time.
    $when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time.
?>
    <!--'..time ago' is echoed out. -->
    <div class="time_ago" <h2><?php echo "..".$when; ?></h2> </div>
    
    <div id="place_delete_edit2"> 
        <div class="place_of_post" <p><?php echo "Place: ".ucwords($row["place_of_post"]); //The first character of every word is displayed capital (Reason for ucword: Some places have two words. ?></p> </div>
        <div class="gender" <h2><?php echo "by ".ucfirst($row["gender"]); //The first character is displayed capital. ?></h2> </div>

        <!--If-statement to make sure users can only delete their own posts. -->
        <?php if ($_SESSION["user_id"]==$row["user_id"]){  //Check if the user_id saved as a session variable is the same as user_id in table. ?>
            <div class="delete_edit" id="delete_post"><a href="delete_post.php?id=<?php echo $row["id"]; //Passing post_id as URL parameter. ?>">Delete post?</a></div>
        <?php } ?>
    </div>
        <div class="post" <p><?php echo ucfirst($row["post"]); //The first character is displayed capital. ?></p> </div>
    </div>
<?php } ?>
        
