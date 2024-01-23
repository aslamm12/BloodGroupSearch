<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "blood_register";




$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



$name = $_POST["name"];
$phone = $_POST["no"];
$email = $_POST["email"];

$blood_group = $_POST["blood_group"];


$sql = "INSERT INTO blood_groups (name, phone, email, blood_group)
VALUES ('$name', '$phone', '$email', '$blood_group')";



if ($conn->query($sql) === TRUE) {

    echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 40; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
        echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
	echo "</style>";
	echo "</head>";

    echo "<body>";
    echo "<div class=centered-text><img src=success.png width=50 height=50><br><br>Created record successfully</div>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";
    echo "</body>";
	echo "</body>";

} else {


    echo "<head>";
    echo "<style>";
    echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo ".centered-text {margin: 0 50; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "</style>";
    echo "</head>";

    echo "<body>";
	echo "<div class=centered-text><img src=error.png width=50 height=50><br><br> The phone no you entered is already taken ! </div>";

    //echo "<br>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";
    echo "</body>";
}

$conn->close();

?>