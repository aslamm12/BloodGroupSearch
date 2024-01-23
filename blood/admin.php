<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data here

    // Redirect to the web page
    header("LOCATION:delete.html");
    exit();
  }
?>