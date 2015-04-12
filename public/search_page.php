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
        <title>Format Code</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
        <body class="search_page">
                <?php if(isset($_SESSION["user"])) {?>
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
                        <div class="box_hello"><a>Hello, <?php echo ucfirst($_SESSION["user"]); ?>! </a></div>
                    </div>
            
            
            
                    <form class= "search" action="index.php" method="post">
                        <p>Search</p><input type="text" name="search" placeholder="Search by words..." pattern="[^'\x22]+" title="Invalid input">
                        <input type="submit" value="Go!" />
                    </form>
                <?php } ?>
            
            <div class="footer">
                Copyright ©Turtletalks.com 
            </div>
    </body>
</html>

<?php include_once("../includes/templates/footer.php"); ?> 
