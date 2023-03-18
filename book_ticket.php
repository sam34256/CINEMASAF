<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to check if a seat is available
function isAvailable($seat) {
  global $conn;

  $sql = "SELECT * FROM seats WHERE seat = '$seat'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['available'] == 1) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

// Function to update seat availability
function updateSeat($seat, $available) {
  global $conn;

  $sql = "UPDATE seats SET available = '$available' WHERE seat = '$seat'";

  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get selected seat(s)
  $seats = $_POST['seats'];

  // Loop through each selected seat and update availability in database
  foreach ($seats as $seat) {
    $success = updateSeat($seat, 0);
    if (!$success) {
      die("Error updating seat availability.");
    }
  }

  // Redirect to confirmation page
  header('Location: confirmation.php');
  exit;
}

// Close database connection
$conn->close();
?>
