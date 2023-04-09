<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the submitted email address and new password
  $email = $_POST['email'];
  $password = $_POST['confirm'];

  $db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');
  // Update the customer's password in the database
  $stmt = $db->prepare("UPDATE customers SET cus_pw = ? WHERE cus_email = ?");
  $stmt->bind_param("ss", $password, $email);
  $stmt->execute();

  if ($stmt->affected_rows == 1) {
    echo 'Your password has been successfully reset.';
  } else {
    echo 'Query not successful.';
  }

  $stmt->close();
  $db->close();
}

?>