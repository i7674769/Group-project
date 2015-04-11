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
        <body class="filter_page">
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
                                <a href="search_page.php">
                                    <p>Search</p>
                                </a>
                            </div>

                            <div class="section4">
                                <a href="filter.php">
                                    <p>Filter</p>
                                </a>
                            </div>
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
                        <input type="submit" onClick="redirect();" />
                        </select>
                    </form>
                    </div>
                    <?php } ?>

                    <?php
                        if(isset($_POST['sort'])) {
                            $sort = $_POST['sort'];
                            // query to get all tablot_campus records
                            $query = "SELECT * FROM posts WHERE place_of_post='{$sort}'";
                        } else {
                            $query = "SELECT * FROM posts";
                        }


                        $result = mysqli_query($connect, $query);

							while($row = mysqli_fetch_assoc($result)) {
                                include 'box2.php';
                            }
                    ?>
            <div class="footer">
                Copyright ©Turtletalks.com 
            </div>


    </body>
    </html>
<?php include_once("../includes/templates/footer.php"); ?>
