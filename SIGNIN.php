
<?php
// Define variables and initialize with empty values
$username = "";
$password = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // set username to variable
    $username = $_POST["username"];

    // set password to variable
    $password = $_POST["password"];
  }

    // Create a new database connection
    $db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');

    //db query to search for the inputted username and password
    $checkquery = "SELECT * FROM customers WHERE cus_email='$username' AND cus_pw='$password'";
    $result = $db->query($checkquery);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // The query was successful, so do something with the results
        header('Location: thankyou.html');
    } else {
        // The query was not successful, so handle the error
        echo '<script>alert("No User Found")</script>';
    }

    $db->close();
    exit;
?>