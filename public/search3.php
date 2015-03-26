<?php
$output='';

if(isset($_POST["search"])) {
    $searchq= $_POST["search"];
   
    $query = mysql_query("SELECT * FROM posts WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%searchq%'") or die("could not search!");
    
    $count= mysql_num_rows($query);
    if($count==0){
        $output = 'There was no search results!';
    }else{
            while ($row=mysql_fetch_array($query)) {
                $fname = $row['firstname'];
                $lname =$row['lname'];
                
                $output .='<div>'.$fname.''.$lname.'</div>';
    }





?>
<!DOCTYPE html>

<html>

<head>
    
    <title>Search</title>
    
    </head>
    
<body>



<form action="index3.php" method="post">
    
    <input type="text" name="search" placeholder="Search for members..."/>
           <input type="submit" value=">>" />
    
    
    
    
    </form>
    <?php print("$output");?>



    
    
</body>
</html>
