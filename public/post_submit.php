<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["submit"])) {
        
        $post = $_POST['post'];
        $place_of_post = $_POST['place_of_post'];
        
        if(empty($post)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a post!") 
            </script>'; 
        }else if (empty($place_of_post)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a place!") 
            </script>'; 
        }else {
            $query = "INSERT INTO posts (post, user_id, gender, place_of_post) VALUES ('{$post}', '{$_SESSION['user_id']}', '{$_SESSION['gender']}', '{$place_of_post}')"; 
            $result = mysqli_query($connect, $query); 
            if($result) {
                echo '<script type="text/javascript" language="Javascript">  
                alert("Your post was added!") 
                </script>';   
            } else {
                echo '<script type="text/javascript" language="Javascript">  
                alert("Something went wrong!") 
                </script>'; 
            }
            
            $post = "";
            $name = ""; 
            $gender = "";
  
        }
    }
    
?>
