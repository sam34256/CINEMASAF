<?php

// Set up the database connection
$db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the submitted email address
  $email = $_POST['email'];
  $answer1 = $_POST['answer1'];
  $answer2 = $_POST['answer2'];

  // Retrieve the customer's information from the database
  $stmt = $db->prepare("SELECT * FROM customers WHERE cus_email = ? AND cus_answer1 = ? AND cus_answer2 = ?");
  $stmt->bind_param("sss",$email,$answer1,$answer2);
  $stmt->execute();

  $result = $stmt->get_result();
  // Check if a matching customer was found
  if ($result->num_rows == 1) {
    echo '<form method="post" action="reset_password.php">';
    echo '<input type="hidden" name="email" value="' . $email . '">';
    echo 'New Password: <input type="password" name="password"><br>';
    echo 'Confirm Password: <input type="password" name="confirm"><br>';
    echo '<input type="submit" value="Reset Password">';
    echo '</form>';
    
}else {
    // Display an error message if the answers do not match
    echo 'Sorry, your answers did not match our records. Please try again.';}}
    $stmt->close();
    $db->close();
?>
