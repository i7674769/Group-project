<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["submit"])) {
        
        $tweet = $_POST['tweet'];
        
        if(empty($tweet)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a post!") 
            </script>'; 
        }else if (empty($place_of_post)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a place!") 
            </script>'; 
        }else {
            $query = "INSERT INTO posts (tweet, user_id, gender) VALUES ('{$tweet}', '{$_SESSION['user_id']}', '{$_SESSION['gender']}')"; 
            $result = mysqli_query($connect, $query); 
            if($result) {
                $message = "Success, your post was added!";   
            } else {
                $message = "Sorry, something went wrong!"; 
            }
            
            $tweet = "";
            $name = ""; 
            $gender = "";
  
        }
    }
?>
