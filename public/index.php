<?php require_once("../includes/sessions.php"); ?>
<?php require_once("signup.php"); ?>
<?php require_once("post_submit.php"); ?>
<?php require_once("login.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<?php 
    if(isset($_POST["sort"])) {
        $sort = $_POST["sort-by"];
        
        if(strcmp($sort, "new") == 0) {
            $query = "SELECT * FROM posts ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM posts ORDER BY id ASC";
        }
    } else {
        if(isset($_POST["search"])) {
            $searchTerm = $_POST["search"];
            $query = "SELECT * FROM posts WHERE tweet LIKE '%{$searchTerm}%' ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM posts ORDER BY id DESC";
        }
    }

    $result = mysqli_query($connect, $query); 
    if(!$result) {
        die("Query Error");  
    }
?>



<!doctype html>
<html>
    <head>
        <title>Format Code</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    
        <div class="container">
            
            <?php if(isset($_SESSION["user"])) {?>

            <body class="tweet_page">
                <?php } else {?>
                        <div class="register-title"></p></div>
                        <div class="login_box">
                            <form action="index.php" method="post" autocomplete="off">
                                <input type="text" name="name" value="" placeholder="Name"/>
                                <input type="password" name="password" value="" placeholder="Password"/>
                                <input type="submit" name="login" value="Login" /></p>
                            </form> </div>

                        <div class="login_toggle">
                        <p> No account?</p>
                        </div>

                         <div class="sign_up_box">   
                                <p>No account? Sign up.</p>
                                <form action="index.php" method="post" autocomplete="off">
                                <div class="register-switch">
                                      <input type="radio" name="gender" value="female" id="sex_f" class="register-switch-input" checked>
                                      <label for="sex_f" class="register-switch-label">Female</label>
                                      <input type="radio" name="gender" value="male" id="sex_m" class="register-switch-input">
                                      <label for="sex_m" class="register-switch-label">Male</label>
                                </div>
                                <input type="text" name="name" value="" placeholder="Name" pattern="{1,}" required title="Please enter a name."/>
                                <input type="password" name="password" value="" placeholder="Password" pattern="(?=.*\d).{8,}" required title="Must contain at least one number.">
                                <input type="password" name="confirm_password" value="" placeholder="Confirm Password"/>
                                <input type="text" name="student_id" value="" placeholder="Student ID" pattern="[0-9].{6,}" required title="7 characters minimum and only numbers are allowed."/>
                                <div class="dropdown">    
                                    <input type="submit" name="signup" value="Sign up!"/> </p> 
                                </form>

                        </div>
                </body>

                <?php } ?>
                <body class="login_page">
                   <?php if(isset($_SESSION["user"])) {?>
                
                    <div id="nav">
                        <a href="">
                            <div class="section1">
                                    <img class="turtle" src="img/turtle01.png">
                            </div>   
                        </a>
                        <a href="aboutus.php"> 
                            <div class="section2">
                                <p>About</p>
                            </div>
                         </a>
                        <a href="search.php">
                            <div class="section3">
                                    <p>Search</p>
                            </div>
                        </a>
                        <a href="filter.php">
                            <div class="section4">
                                    <p>Filter</p>
                            </div>
                        </a>
                    </div>
                    
                    <div class="box_tweet_gender">
                        <div class="box_hello">
                            <form class= "logout_button" method="link" action="logout.php">
                            <input type="submit" value="Logout">
                            </form>
                        
                        <div class="delete_toggle">
                        <p>Delete Account</p>
                        </div>
                        
                        <div class="delete"><a href="delete.php?id=<?php echo $_SESSION["user_id"] ?>">Sure?</a></div>
                         
                        </div>
                        <div class="box_hello"><a>Hello, <?php echo ucfirst($_SESSION["user"]); ?>! </a></div>
                        <form class="box_tweet_gender_content" action="index.php" method="post">
                            What's up? <input type="text" name="tweet" value="" pattern=".{4,1000}" required title="4 characters minimum/1000 characters maximum"/>
                            Where are you?: <select name="place_of_post" class="dropdown">
                                            <option value="">--Select--</option>
                                            <option value="talbot campus">Talbot Campus</option>
                                            <option value="landsdowm campus">Landsdown Campus</option>
                                            <option value="halls">Halls</option>
                                            <option value="private accommodation">Private Accommodation</option>
                                            <option value="unilet">Unilet</option>
                                            <option value="town">Town</option>
                                            <option value="none">None</option>
                                            </select>
                        <input type="submit" name="submit" value="Submit" />
                        </div>
                        </form>
                    <?php } ?>

                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                                include 'box2.php';
                            }
                    ?>

    </body>
</html>

<?php
    mysqli_free_result($result);
    mysqli_close($connect);
?>

<div class="footer">
Copyright ©Turtletalks.com
</div>

<?php include_once("../includes/templates/footer.php"); ?> 
