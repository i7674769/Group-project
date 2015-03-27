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
