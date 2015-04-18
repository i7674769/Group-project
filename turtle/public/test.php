<?php if(isset($_SESSION["user"])) {?> 
            <div class="box">
                <form action="index.php" method="post">
                    Name: <input type="text" name="name" value="<?php echo $name; ?>" />
                    Tweet: <input type="text" name="tweet" value="<?php echo $tweet; ?>" />
                    Gender: <select name="gender">
                                <option value="">--Select--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </div>
        <?php } ?>

<?php
    if(isset($_POST["submit"])) {
        
        if(empty($name)) {
            $message = "Invalid name";
        } else if(empty($tweet)) {
            $message = "Invalid tweet";
        }else if(empty($gender)) {
            $message = "Please select gender";
        } else {
            $query = "INSERT INTO posts (name, tweet, gender) VALUES ('{$name}', '{$tweet}', '{$gender}')";
            $result = mysqli_query($connect, $query); 

            if($result) {
                $message = "Success, your post was added!";   
            } else {
                $message = "Sorry, something went wrong!"; 
            }
            
            $name = "";
            $tweet = ""; 
            $gender = "";
  
        }
    }
?>

<?php if(isset($_SESSION["user"])) {?>
                <div class="box">
                    <p> Hello, <?php echo $_SESSION["user"]; ?>!</p>
                    <a href='logout.php'>Logout?</a></p>

                </div>
            <?php } else {?>
                    <div class="box">
                        <form action="index.php" method="post">
                            Name: <input type="text" name="name" value=""/>
                            Password: <input type="text" name="password" value=""/>
                            <input type="submit" name="login" value="Login" /></p>
                        </form>
                        <form action="index.php" method="post">
                            Name: <input type="text" name="name" value=""/>
                            Password: <input type="text" name="password" value=""/>
                            <input type="submit" name="createaccount" value="Sign up!" /> </p> //remember for logout
                        </form>
                    </div>
            <?php } ?>

<?php
    if(isset($_POST["submit"])) {
        if(empty($name)) {
            $message = "Invalid name";
        } else if(empty($password)) {
            $message = "Invalid password";
        } else {
            $query = "INSERT INTO users (name, password) VALUES ('{$name}', '{$password}')";
            $result = mysqli_query($connect, $query); 

            if($result) {
                $message = "Success, your account was added!";   
            } else {
                $message = "Sorry, something went wrong!"; 
            }
            
            $name = "";
            $password = ""; 
  
        }
    }
?>