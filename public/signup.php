<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["signup"])) { //Only if the form 'signup' is submitted.
        
        $name = $_POST['name']; //Declaring variable $name.
        $password = $_POST['password']; //Declaring variable $password.
        $confirm_password = $_POST['confirm_password']; //Declaring variable $confirm_password.
        $student_id = $_POST['student_id']; //Declaring variable $student_id.
        $gender = $_POST["gender"]; //Declaring variable $gender.
        
        //The following checks if the password is the same as the confirm_password.
        //Originally used for checking if all the fields were empty but we switched to another form of validation.
        
        if(empty($confirm_password)) { //Checks if it is empty.
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter password again!") 
            </script>'; //If the field is empty, this message will be echoed out using js.
        } else if ($password != $confirm_password) { //Checks if password is the same as confirm_password- 
            echo '<script type="text/javascript" language="Javascript">  
            alert("Passwords do not match!") 
            </script>'; //In case the passwords do not match, this message will be echoed out using js.
        } else {
            $query = "INSERT INTO users (name, password, student_id, gender) VALUES ('{$name}', '{$password}', '{$student_id}','{$gender}')"; //Query to save the entered data in a collum into the table 'users'.
            $result = mysqli_query($connect, $query); 
            
                if($result) {
                    echo '<script type="text/javascript" language="Javascript">  
                    alert("Your account has been registered!") 
                    </script>'; // If it was successful, this message will be echoed out using js.
                } else {
                    echo '<script type="text/javascript" language="Javascript">  
                    alert("Sorry, something went wrong!") 
                    </script>'; // If it was not successful, this message will be echoed out using js.
                }
            
                    $name = ""; //In case there is nothing entered, this is empty.
                    $password = ""; //In case there is nothing entered, this is empty.
                    $confirm_password = ""; //In case there is nothing entered, this is empty.
                    $student_id = ""; //In case there is nothing entered, this is empty.
                    $gender = ""; //In case there is nothing entered, this is empty.
        }
    }
?>
