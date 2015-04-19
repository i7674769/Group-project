<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
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
            $query = "SELECT * FROM posts WHERE post LIKE '%{$searchTerm}%' ORDER BY id DESC";
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
        <title>Turtle Talks</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
            <?php if(isset($_SESSION["user"])){ //An if-statement is used here to make sure the following content is only displayed once the session has started. This seperated the login_page and the sign_up page. ?>
                <body class="post_page">
                    <div id="nav">
                        <a href="index.php">
                            <div class="section1">
                                <img class="turtle" src="img/turtle01.png">
                            </div>   
                        </a>
                        <a href="aboutus.php"> 
                            <div class="section2">
                                <p>About</p>
                            </div>
                         </a>
                        <a href="search_page.php">
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
                    
                    <div class="box_post_gender">
                        <div class="box_hello">
                            <form class= "logout_button" method="link" action="logout.php">
                            <input type="submit" value="Logout">
                            </form>
                        <div class="delete_toggle">
                            <p>Delete Account</p>
                        </div>
                        <div class="delete"><a href="delete.php?id=<?php echo $_SESSION["user_id"] ?>">Sure?</a></div>
                        </div>
                        <div class="box_hello2"><a>Hello, <?php echo ucfirst($_SESSION["user"]); //To adress the user logged in, the name saved as session variable is displayed. ?>! </a></div>
                        <form class="box_post_gender_content" action="index.php" method="post">
                            <div id="form_post">
                            <!-- The following Attribute 'pattern' is used to validate the input and set a min/max of allowed characters.-->
                            What's up? <input type="text" name="post" value="" placeholder="Max 1000 words.." pattern=".{4,1000}" required title="4 characters minimum/1000 characters maximum"/>
                            </div>
                            <div id="form_place">
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
                        </form>
                            </div>
                    </div>
                    
                    <div class="footer">
                        Copyright ©Turtletalks.com 
                    </div>
                </body>
    
                <?php } else {?>
                    <body class="login_page">
                    <!--In case the session was not started, the following content is displayed (login/signup_page).-->
                            <div class="register-title"></p></div>
                            <div class="login_box">
                                <form action="index.php" method="post" autocomplete="off">
                                    <input type="text" name="student_id" value="" placeholder="Student ID"/>
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
                                    <!-- The following Attribute 'pattern' is used to validate the input.-->
                                    <input type="password" name="password" value="" placeholder="Password" pattern="(?=.*\d).{8,}" required title="Must contain at least one number.">
                                    <input type="password" name="confirm_password" value="" placeholder="Confirm Password"/>
                                    <!-- The following Attribute 'pattern' is used to validate the input.-->
                                    <input type="text" name="student_id" value="" placeholder="Student ID" pattern="[0-9].{6,}" required title="7 characters minimum and only numbers are allowed."/>
                                    <div class="dropdown">    
                                        <input type="submit" name="signup" value="Sign up!"/> </p> 
                                    </form>
                            </div>
                        </body>
                    <?php } ?>

                    <?php
                        while($row = mysqli_fetch_assoc($result)) { 
                                include 'box2.php'; //The while loop is used to include the file box2.php each time the user creates a new post. This way, the posts will be displayed.
                            }
                    ?>


</html>

<!--Including the file footer.php. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php include_once("../includes/templates/footer.php"); ?> 
