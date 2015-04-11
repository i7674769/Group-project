<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["signup"])) {
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $student_id = $_POST['student_id'];
        $gender = $_POST["gender"];
        
        //this checks if the password is the same as the confirm_password
        //originally used for checking if all the fields were empty but we switched to another form of validation
        
        if(empty($confirm_password)) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Please enter password again!") 
            </script>'; 
        } else if ($password != $confirm_password) {
            echo '<script type="text/javascript" language="Javascript">  
            alert("Passwords do not match!") 
            </script>';
        } else {
            $query = "INSERT INTO users (name, password, student_id, gender) VALUES ('{$name}', '{$password}', '{$student_id}','{$gender}')";
            $result = mysqli_query($connect, $query); 
            
                if($result) {
                    echo '<script type="text/javascript" language="Javascript">  
                    alert("Your account has been registered!") 
                    </script>'; 
                } else {
                    echo '<script type="text/javascript" language="Javascript">  
                    alert("Sorry, something went wrong!") 
                    </script>'; 
                }
            
                    $name = "";
                    $password = ""; 
                    $confirm_password = ""; 
                    $student_id = "";
                    $gender = "";
        }
    }
?>
