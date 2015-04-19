<!-- This is the section that tells the server what to search for>

<?php
    $output='';
        if(isset($_GET["search"])) {
            $searchq= $_GET["search"];
            $query = mysql_query("SELECT * FROM posts WHERE firstname LIKE '%{$_GET["$searchq"]}%' OR lastname LIKE '%{$_GET["$searchq"]}%'") or die("could not search!");
            $count= mysql_num_rows($query);
                if ($count==0){
                    $output = 'There was no search results!';
                } else {
                        while ($row=mysql_fetch_array($query)) {
                            $id = $row['id'];
                            $user_id =$row['user_id'];
                            $post =$row['post'];
                            $gender =$row['gender'];
                            $dateofpost =$row['dateofpost'];
                            $placeofpost =$row['placeofpost'];

                            $output .='<div>'.$id.''.$user_id.''.$post.''.$gender.''.$dateofpost.''.$placeofpost.'</div>';
                }
                }
                }

?>
<?php print("$output");?>

