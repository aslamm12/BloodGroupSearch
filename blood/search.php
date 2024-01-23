<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "blood_register";




$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

// Query the database

$blood_group = $_POST["search_blood_group"];
$sql = "SELECT * FROM blood_groups WHERE blood_group='$blood_group'";
$result = $conn->query($sql);



// Check if the query was successful
if ($result->num_rows > 0) {

    echo "<head>";
    echo "<style>";
    echo "table{margin:0 auto; width:80%; color:#240c0c; background-color:white; border-radius:10px;}";
    echo "h1{color: #240c0c; text-align: center; padding: 20px 40px; display: block}";
    echo "th, td{text-align:left; border-bottom: 1px solid #ccc;}";
    echo "th{background-color:white;}";
    echo "tr:hover {background-color:#E6E6E6;}";
    echo ".button {padding: 10px 20px; margin: 0 auto;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "</style>";
    echo "</head>";
        

    echo "<body bgcolor=white>";
    echo "<h1>Results</h1>";
    echo "<table border=2 cellpadding=20 cellsapacing=20>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Phone No</th>";
    echo "<th>E-mail</th>";
    echo "<th>Blood Group</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
	echo "<td>" . $row["blood_group"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";
    echo "</body>";
} else {
    echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 40;font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "</style>";
    echo "</head>";

    echo "<body>";
    echo "<div class=centered-text>No results found !</div>";
    echo "</body>";

}

// Close the connection
$conn->close();

?>