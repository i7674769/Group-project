<<?php

$sql = mysql_query("SELECT * FROM post WHERE pagecontent LIKE '%$_GET[term]%' LIMIT 0,$_GET[results]");

while($ser = mysql_fetch_array($sql)) { echo "<h2><a href='$ser[pageurl]'>$ser[pageurl]</a></h2>"; }

//URL of page, will get source code read and made into variable

$pagedata=htmlspecialchars(file_get_contents($_POST['url']));

// take away some single quotes that could disorder the query
$pagedata=str_replace(" ", " ", $pagedata);

//small message to see if its been added

echo"URL Added.<br><a href='./addurl.php>Continue...</a>";?>











?>
<hr>
<a href="./index.php">Go Back</a>
