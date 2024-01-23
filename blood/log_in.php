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

	// Query the database to check if the username and password are correct
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);

	// If the username and password are correct, redirect to the welcome page
	if (mysqli_num_rows($result) == 1) {
		header("Location: main.html");
		exit();
	} else {
    echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 50; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
	echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "</style>";
    echo "</head>";

    echo "<body>";
    echo "<div class=centered-text><img src=error.png width=50 height=50><br><br> The usernmae you entered is not registered,<br>kindly please register from the home page !</div>";
    echo "<form>";
    echo "<input type=button value=Home class=button onclick=history.go(-2)>";
    echo "</form>";
    echo "</body>";
	}
}

// Close the database connection
mysqli_close($conn);
?>
