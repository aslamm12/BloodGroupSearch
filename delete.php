<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the selected phone no
  $phone_no = $_POST['phone'];

  // Validate the phone no
  if (empty($phone_no)) {
    echo "Please enter a phone no.";
    exit;
  }

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blood_register";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Delete the blood group details from the database
  $sql = "DELETE FROM blood_groups WHERE phone='$phone_no'";

  if (mysqli_query($conn, $sql)) {
    echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 40; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
        echo ".button {padding: 10px 20px; margin: 0 40;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
	echo "</style>";
    echo "</head>";

    echo "<body>";
    echo "<div class=centered-text><img src=success.png width=50 height=50><br><br>Blood group details deleted successfully</div>";
    echo "</body>";
    echo "<br>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";

  } else {
    echo "<head>";
    echo "<style>";
    echo ".centered-text {margin: 0 50; font-size: 32px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo ".button {padding: 10px 20px; margin: 0 auto;display: block; font-size: 15px; font-weight: bold; color: #333; margin-top: 50px;}";
    echo "</style>";
    echo "</head>";

    echo "<body>";
    echo "<div class=centered-text><img src=error.png width=50 height=50><br><br> Error deleting blood group details ! </div><br>";
    echo "<br>";
    echo "<form>";
    echo "<input type=button value=Back class=button onclick=history.go(-1)>";
    echo "</form>";
    echo "</body>";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
