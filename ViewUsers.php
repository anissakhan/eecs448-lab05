<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "anissakhan", "eo9eVey9", "anissakhan");

//echo "<style type=\"text/css\">";
//include 'style.css';
//echo "</style>";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query1 = "SELECT user_id FROM Users";

echo "<table>";
echo "<th>Users</th>";
if ($result = $mysqli->query($query1)) {
    /* fetch associative array; while fetch_assoc is not null: keeps bringing stuff in */
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";//begin new table row
        //echo "Row variable: ".$row["user_id"]."<br>"; 
        echo "<td style=\"text-align: center; border: 1px solid black\">".$row["user_id"]."</td>";
        echo "</tr>";//end that row
    }

    /* free result set */
    $result->free();
}
echo "</table>";

/* close connection */
$mysqli->close();

?>