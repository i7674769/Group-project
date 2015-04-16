<?php require_once("../includes/sessions.php"); ?>
<?php require_once("signup.php"); ?>
<?php require_once("post_submit.php"); ?>
<?php require_once("login.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<!DOCTYPE html>
<html>
    <head>
            <title>Turtle Talks</title>
            <link rel="stylesheet" href="css/styles.css" type="text/css"/>
            <link rel="stylesheet" href="css/style.css" type="text/css"/>
    </head>
    <body>
                <?php if(isset($_SESSION["user"])) {?>
                <!--An if-statement is used here to make sure the following content is only displayed once the session has started. This seperated the login_page and the sign_up page.-->
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
                    <?php } ?>
        
        <div id="body">
                    <div align="center">
                        <img src="img/turtletalk.png" style="width: 900px; height: 150x; display: inline; margin-bottom: 5px">
                    <div id="banner">  
                        <img src="img/turtle.png">
                    </div>
                    <div class="box">
                        <img src="img/Darlene.jpg" style="width: 100px; height: 100x; display: inline; margin: auto">
                    <h1>Darlene Buttner</h1>
                        <p><a class="box1" href="http://www.darlenebuttner.wordpress.com" role="button" style="margin-bottom: 15px">View Blog &raquo;</a></p>
                    </div>      
                    <div class="box">
                        <img src="img/bex.jpg" style="width: 100px; height: 100x; display: inline; margin: auto">
                    <h1>Rebecca Hughes</h1>
                        <p><a class="box1" href="http://www.beckyhughes94.wordpress.com" role="button" style="margin-bottom: 15px">View Blog &raquo;</a></p>
                    </div>
                    <div class="box">                
                        <img src="img/tina.jpg" style="width: 100px; height: 100x; display: inline; margin: auto">
                    <h1>Christina Sabine</h1>
                    <p><a class="box1" href="http://www.christinasabine.wordpress.com" role="button" style="margin-bottom: 15px">View Blog &raquo;</a></p>
        </div>
                    <div class="box">
                        <img src="img/rafiel.jpg" style="width: 100px; height: 100x; display: inline; margin: auto">
                    <h1>Israfiel Negasi</h1>
                        <p><a class="box1" href="http://www.rafielnegasi.wordpress.com" role="button" style="margin-bottom: 15px">View Blog &raquo;</a></p>
                        </div>
                    
                        <div class="infobox">
                            <p>___</p>
                <p>Hello There! and Welcome to TURTLE TALKS! Make yourself feel at home and kick back and just relax! This website is made for Bournemouth University Students to express themself freely due to all posts on this website are anonymous. You can express your ideas, experiences and views about anything you like while in uni and also at home anonymously to over peers here at Bournemouth University. This site is so you can freely post what you wish without the theat of other people knowing who has posed it...</p>         
                <p>__________________________________________________________ </p>
                <p>“This Page is so you have your own freedom to talk about your views and ideas, If for any reason you show harm or offence to yourself or anybody else’s safety or well-being your information will be disclosed and used to know the identify of yourself, but only to the admins will be aware of this information. Besides from this your information is completely safe and not be displayed to the public”.</p>
                            <p>___</p>
                        </div>  
                </div>
                <div class="footer">
                        Copyright ©Turtletalks.com 
                </div>

        </div>
    </body>
</html>
<?php include_once("../includes/templates/footer.php"); ?>
