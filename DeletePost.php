<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query1 = "SELECT post_id FROM Posts";
$postCounter = 0;

$toDelete = 1;
$query2 = "DELETE FROM Posts WHERE post_id='".$toDelete."'";

if ($result = $mysqli->query($query1)) {
    while ($row = $result->fetch_assoc()) { 
        $postCounter++;
        $toDelete=$row[post_id];
        $query2 = "DELETE FROM Posts WHERE post_id='".$toDelete."'";
        if(isset($_POST["post".$postCounter.""]))
        {
                $mysqli->query($query2);
                echo "Post with post ID of '".$toDelete."' has been deleted.<br>";
        }
    }

    $result->free();
}

/* close connection */
$mysqli->close();

?>