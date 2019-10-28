<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userName = $_POST["username"];
$content = $_POST["content"];
$existingUser = 0;

//query1: adds post to table; query2: looks at the User table to see if user exists
//$query1 = "INSERT INTO Posts (author_id) VALUES ('".$userName."')";
$query1 = "INSERT INTO Posts (author_id, content) VALUES ('".$userName."','".$content."')";
$query2 = "SELECT user_id FROM Users";

//check if either username or post are empty
if($userName=="" || $content=="") {
         echo "You must enter both a Username and a Post.<br>";
         exit();
 }

//check if the username is in the Users table. If it is not, enters the else statement and exits the program.
//if it is in the table, does nothing
if ($result = $mysqli->query($query2)) {
    /* fetch associative array; while fetch_assoc is not null: keeps bringing stuff in */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"]==$userName)
        {
		//does nothing. only exits if the username is does not exist.
		$existingUser = 1;
	}
    }

    if($existingUser==0)
    {	
    		echo "Username ".$userName." does not exist. Enter an existing username.<br>";
                exit();
    }

    $result->free(); 
}


//do query1: add the post to the table
$mysqli->query($query1);
echo "Your post has been successfully added.<br>";

//$query3 = "SELECT LAST_INSERT_ID()";

//if($result = $mysqli->query($query3)){
//	echo "post_id: ".$row."<br>";
//}
//$result->free();

/* close connection */
$mysqli->close();

echo "<br><a href=\"AdminHome.html\">Return to Admin Home</a><br>";

?>