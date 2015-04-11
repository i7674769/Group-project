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
                            <div class="section1">
                                <a href="index.php">
                                    <img class="turtle" src="img/turtle01.png">
                                </a>
                            </div>           
                            <div class="section2">
                                <a href="aboutus.php"> 
                                    <p>About</p>
                                </a>
                            </div>
                        
                            <div class="section3">
                                <a href="search.php">
                                    <p>Search</p>
                                </a>
                            </div>
                        
                            <div class="section4">
                                <a href="filter.php">
                                    <p>Filter</p>
                                </a>
                            </div>
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
                    </div>
            
            
            
                    <form class= "search" action="index.php" method="post">
                        <p>Search</p><input type="text" name="search" placeholder="Search by words..." pattern="[^'\x22]+" title="Invalid input">
                        <input type="submit" value="Go!" />
                    </form>
    
                    <?php } ?>

    </body>
</html>

<?php include_once("../includes/templates/footer.php"); ?> 
