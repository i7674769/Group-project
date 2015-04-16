<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php 
    if(isset($_POST["login"])) { //Only if the form 'login' is submitted.
        $student_id = $_POST["student_id"]; //Declaring variable $name.
        $password = $_POST["password"]; //Declaring variable password.
        $query = "SELECT * FROM users WHERE student_id='{$student_id}' AND password='{$password}'LIMIT 1"; //Query to select name and password from the table users. 
        $result = mysqli_query($connect, $query); 
        
        if ($user = mysqli_fetch_assoc($result)) { //Only if successful. Saving variables user/gender/user_id from selected user collum in session. 
            $_SESSION["user"] = $user["name"];
            $_SESSION["gender"] = $user["gender"];
            $_SESSION["user_id"] = $user ["id"];
        } else {
            echo '<script type="text/javascript" language="Javascript">  
            alert("This user does not exist!") 
            </script>'; //In case no results found, this message is echoed out in an alert window using js. 
        }
    } 
?>
