<?php
    $_POST = "SELECT tweet FROM posts ORDER BY post_id DESC";
    // database columom rows name ----- database name
	$result = mysqli_query($connection, $_POST);
// result query code
?>

    <div class="post" >
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div id="post-header">
        <span id="name"><?php echo $row["tweet"]; ?></span>
     </div>
