<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userName = $_POST["username"];
$query1 = "INSERT INTO Users (user_id) VALUES ('".$userName."')";
$query2 = "SELECT user_id FROM Users";

if($userName=="")
 {
	 echo "You must enter a Username.";
	 exit();
 }
//do query1
//$mysqli->query($query1);

if ($result = $mysqli->query($query2)) {
    /* fetch associative array; while fetch_assoc is not null: keeps bringing stuff in */
    while ($row = $result->fetch_assoc()) {
	//echo "Row variable: ".$row["user_id"]."<br>";
	if($row["user_id"]==$userName)
	{
		echo "Username ".$userName." already exists.<br>";
		exit();
	}
    }
    
    //do query1
    $mysqli->query($query1);
    //check that the new username is in the table
    //reset result variable to include new username
    $result=$mysqli->query($query2);
        while ($row = $result->fetch_assoc()) {
        //echo "Row variable: ".$row["user_id"]."<br>";
        if($row["user_id"]==$userName)
        {       
                echo "Username ".$userName." successfully added.<br>";
        }
    } 
    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
echo "<br><a href=\"AdminHome.html\">Return to Admin Home</a><br>";
?>