<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<?php echo $_SESSION["user_id"]; ?>

<?php
if(isset($_POST["submit"])) {
$to = "becky_hughes94@hotmail.co.uk";
$subject = ($_POST["subject"]);

$mail = ($_POST["mail"]);

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



mail($to,$subject,$mail);
}
?>

 <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading text-center">Send a report</h2>
       <label class="sr-only">subject</label>
        <input type="text" class="form-control" placeholder="subject" name="subject" value="" />
        <label class="sr-only">Mail</label>
        <input type="text"   class="form-control" placeholder="mail" name="mail" value="" />
     <button  class="" type="submit" name="submit" value="Submit">send mail</button>
     
     
<?php include_once("../includes/templates/footer.php"); ?>
