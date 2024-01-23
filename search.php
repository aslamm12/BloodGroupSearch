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
$country = $_POST["country"];
$state = $_POST["state"];
$district = $_POST["district"];
$sql = "SELECT * FROM blood_groups WHERE blood_group='$blood_group' AND country='$country' AND state='$state' AND district='$district'";
$result = $conn->query($sql);



// Check if the query was successful
if ($result->num_rows > 0) {

    echo "<head>";
    echo "<style>";
    echo "table{margin:0 auto; width:100%; color:#240c0c; background-color:white; border-radius:0px;}";
    echo ".header {display: block; justify-content: space-between; text-align:center; margin: 0 auto; padding: 15px; background-color: #cc0000; box-shadow: 0px 0px 10px rgba(0,0,0,0.3);}";
    echo ".header h1{color: white; font-size: 30px;}";
    echo "th, td{text-align:left; border-bottom: 1px solid #ccc;}";
    echo "th{background-color:white;}";
    echo "tr:hover {background-color:#E6E6E6;}";
    echo ".button {padding: 10px 20px; margin: 0 auto;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "footer {background-color: #cc0000; color: #fff; padding: 25px 20px; text-align: center;}";
    echo "</style>";
    echo "</head>";
        

    echo "<body bgcolor=white>";
    echo "<header class=header><h1>Results</h1></header>";
    echo "<br>";
    echo "<br>";
    echo "<table border=2 cellpadding=20 cellsapacing=30>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Phone No</th>";
    echo "<th>E-mail</th>";
    echo "<th>Blood Group</th>";

    echo "<th>Date of birth</th>";
    echo "<th>Country</th>";
    echo "<th>State</th>";
    echo "<th>District</th>";
    echo "<th>Place</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
	echo "<td>" . $row["blood_group"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["country"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
	echo "<td>" . $row["district"] . "</td>";
	echo "<td>" . $row["place"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";
    echo "</form>";
    echo "<footer> <p> all the result avilable for the blood group you selected is displayed here. </p> </footer><br><br>";
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