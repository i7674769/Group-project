<?php require_once("../includes/sessions.php"); ?>
<?php require_once("signup.php"); ?>
<?php require_once("post_submit.php"); ?>
<?php require_once("login.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<?php
$output='';

if(isset($_GET["search"])) {
    $searchq= $_GET["search"];
   
    $query = mysql_query("SELECT * FROM posts WHERE firstname LIKE '%{$_GET["$searchq"]}%' OR lastname LIKE '%{$_GET["$searchq"]}%'") or die("could not search!");
    
    $count= mysql_num_rows($query);
    if($count==0){
        $output = 'There was no search results!';
    }else{
            while ($row=mysql_fetch_array($query)) {
                $id = $row['id'];
                $user_id =$row['user_id'];
                $tweet =$row['tweet'];
                $gender =$row['gender'];
                $dateofpost =$row['dateofpost'];
                $placeofpost =$row['placeofpost'];
                
                $output .='<div>'.$id.''.$user_id.''.$tweet.''.$gender.''.$dateofpost.''.$placeofpost.'</div>';
    }
    }
}





?>
<!DOCTYPE html>

<html>

<head>
    
    <title>Search</title>
    
    </head>
    
<body>



<form action="index.php" method="post">
    
    <input type="text" name="search" placeholder="Search for posts..."/>
           <input type="submit" value=">>" />
    
    
    
    
    </form>
    <?php print("$output");?>



    
    
</body>
</html>