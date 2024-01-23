<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_id";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve the username and password from the form
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Insert the new user into the database
	$query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
	$result = mysqli_query($conn, $query);

	// If the insertion was successful, display a success message
	if ($result) {

	echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 40; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
         echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
	echo "</style>";
    echo "</head>";

    echo "<body>";
    echo "<div class=centered-text><img src=success.png width=50 height=50><br><br> User created successfully</div>";
    echo "<form>";
    echo "<input type=button value=Home class=button onclick=history.go(-2)>";
    echo "</form>";
    echo "</body>";

	} else {
    		echo "<head>";
    		echo "<style>";
    		echo ".centered-text {margin: 0 50; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
		echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    		echo "</style>";
    		echo "</head>";

   		 echo "<body>";
    		echo "<div class=centered-text><img src=error.png width=50 height=50><br><br> The username you entered is already taken ! </div>";
		echo "<form>";
    		echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    		echo "</form>";
    		echo "</body>";

	}
}

// Close the database connection
mysqli_close($conn);
?>