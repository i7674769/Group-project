<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["submit"])) { //Only if the form 'submit' is submitted.
        
        $post = $_POST['post']; //Declaring variable $post. 
        $place_of_post = $_POST['place_of_post']; //Declaring variable $post. 
        
        if(empty($post)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a post!") 
            </script>'; //If the post field is empty, this message will be echoed out using js.
        }else if (empty($place_of_post)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter a place!") 
            </script>'; //If the place_of_post field is empty, this message will be echoed out using js.
        }else {
            $query = "INSERT INTO posts (post, user_id, gender, place_of_post) VALUES ('{$post}', '{$_SESSION['user_id']}', '{$_SESSION['gender']}', '{$place_of_post}')"; //Query to save the entered data in a collum into the table 'posts'.
            $result = mysqli_query($connect, $query); 
            if($result) {
                echo '<script type="text/javascript" language="Javascript">  
                alert("Your post was added!") 
                </script>'; //If the post was added, this message will be echoed out using js.
            } else {
                echo '<script type="text/javascript" language="Javascript">  
                alert("Something went wrong!") 
                </script>'; //If the post was not added, this message will be echoed out using js.
            }
            
            $post = ""; //In case there is nothing entered, this is empty.
            $name = ""; //In case there is nothing entered, this is empty.
            $gender = ""; //In case there is nothing entered, this is empty.
  
        }
    }
    
?>
