<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Posts ORDER by post_id";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["post_id"], $row["content"]);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>

//NEW

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//$query = "SELECT * FROM Posts ORDER by post_id";
$userName = $_POST["username"];
$query = "INSERT INTO Users (user_id) VALUES ('$userName')"; 


if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"]==$userName)
        {
            printf ("Username already exists.");
        }
        //printf ("%s %s Name:(%s)\n", $row["post_id"], $row["content"], $row["author_id"]);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
