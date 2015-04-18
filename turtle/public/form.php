<?php //So far, this does not have a use..
    
  /*  if(isset($_POST["submit"])) {
        $name = ucfirst($_POST["name"]);
        $tweet = ucfirst($_POST["tweet"]);
        $gender = ucfirst($_POST["gender"]);
    } else {
        $name = "";
        $tweet = "";  
        $gender = ""; 
    }
    
?>


<!doctype html>
<html>
    <head>
        <title>Format Code</title>
        <link href="css/styles.css" rel="stylesheet" >
    </head>
    
    <body>
        <div class="container">  
            
            <div class="box">
                <?php 
                    if(isset($message)) {
                        echo $message;
                    }
                ?>
            </div>
            
            <form action="form.php" method="post">
                Name: <input type="text" name="name" value="" />
                Tweet: <input type="text" name="tweet" value="" />
                Gender: <select name="gender">
                            <option value="">--Select--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                <input type="submit" name="submit" value="Submit" />
            </form>
            
            <?php 
                echo $name;
                echo $tweet; 
                echo $gender; 
            ?>

        </div>
    </body>
</html>