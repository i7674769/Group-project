<!--Including several files into the index file using a php function. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php require_once("../includes/sessions.php"); ?>
<?php require_once("signup.php"); ?>
<?php require_once("post_submit.php"); ?>
<?php require_once("login.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<!doctype html>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        
        <title>Filter</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
        <body class="filter_page">
                   <?php if(isset($_SESSION["user"])){ //An if-statement is used here to make sure the following content is only displayed once the session has started. This seperated the login_page and the sign_up page. ?>
                    
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
                            <div class="delete"><a href="delete.php?id=<?php echo $_SESSION["user_id"] //Passing post_id as URL parameter. ?>">Sure?</a></div>
                        </div>
                        
                        <div class="box_hello"><a>Hello, <?php echo ucfirst($_SESSION["user"]); //To adress the user logged in, the name saved as session variable is displayed. ?>! </a></div>
                        
                    <form class="sort_place" action="filter.php" method="post">
Only show posts from: <select name="sort" class="dropdown">
                            <option value="">--Select--</option>
                                    <option value="talbot campus">Talbot Campus</option>
                                    <option value="landsdowm campus">Landsdown Campus</option>
                                    <option value="halls">Halls</option>
                                    <option value="private accommodation">Private Accommodation</option>
                                    <option value="unilet">Unilet</option>
                                    <option value="town">Town</option>
                                    <option value="none">None</option>
                        <input value="Go" type="submit" onClick="redirect();" />
                        </select>
                    </form>
                    </div>
                    <?php } ?>

                    <?php
                        if(isset($_POST['sort'])) { //Only if the form above is submitted.
                            $sort = $_POST['sort']; //Declaring the variable $sort.
                            $query = "SELECT * FROM posts WHERE place_of_post='{$sort}'"; //Query to get all the results for the selected place. 
                        } else {
                            $query = "SELECT * FROM posts"; //If no place is selected, show all. 
                        }

                        $result = mysqli_query($connect, $query);
                            
							while($row = mysqli_fetch_assoc($result)) {
                                include 'box2.php'; //The while loop is used to include the file box2.php for each post matching the criteria.
                            }
                    ?>
            <div class="footer">
                Copyright &copy;Turtletalks.com 
            </div>


    </body>
    </html>

<!--Including the file footer.php. 'Require once' checks if the file has already been included and in case it has, it will not include it a second time.--> 
<?php include_once("../includes/templates/footer.php"); ?>
