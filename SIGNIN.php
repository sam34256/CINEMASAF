<?php
// Start a session
session_start();

// Check if the form has been submitted
if (isset($_POST['submit'])) {

	// Get the username and password from the form data
	$username = $_POST['username'];
	$password = $_POST['password'];

     // Create a new database connection
     $db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');

     //db query to search for the inputted username and password
     $checkquery = "SELECT * FROM customers WHERE cus_email ='$username' AND cus_pw ='$password'";
     $result = $db->query($checkquery); 

    echo $username;

	// Validate the username and password
	if ($result->num_rows > 0) {
		// The username and password are correct, so set the session variable and redirect to the home page
		$_SESSION['username'] = $username;
		header('Location: index.html');
		exit;
	} else {
        echo '<script>alert("No User Found")</script>';
		// The username and password are incorrect, so show an error message
		//$error = 'Invalid username or password';
	} 
    $db->close();
    exit;

}

?>