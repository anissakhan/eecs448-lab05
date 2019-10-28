<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(isset($_POST['submit'])){
	$selected_val = $_POST["userid"];  // Storing Selected Value In Variable
}

echo "Posts from user: ".$selected_val."<br><br>";

//if use the commented out query instead, also need the commented out if statement below
//$query1 = "SELECT author_id, content FROM Posts";
$query1 = "SELECT * FROM Posts WHERE author_id='".$selected_val."'";
$postCounter = 1;

if ($result = $mysqli->query($query1)) {
    /* fetch associative array; while fetch_assoc is not null: keeps bringing stuff in */
    while ($row = $result->fetch_assoc()) {
	   // if($row["author_id"]==$selected_val){
		    echo "Post ".$postCounter.": ".$row["content"]."<br>";
		    $postCounter++;
	   // }	    
    }

    /* free result set */
    $result->free();
}

if($postCounter==1)
{
	echo "This user has no posts.<br>";
}

/* close connection */
$mysqli->close();
echo "<br><a href=\"AdminHome.html\">Return to Admin Home</a><br>";
?>