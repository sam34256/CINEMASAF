<?php

// Define variables and initialize with empty values
$name = "";
$email = "";
$phone = "";
$password = "";
$question1 = "";
$question2 = "";
$answer1 = "";
$answer2 = "";


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $email = $_POST["email"];

    $phone = $_POST["phone"];

    $password = $_POST["password"];

    $question1 = $_POST["question1"];
    $question2 = $_POST["question2"];
    
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
  }

    // Create a new database connection
    $db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');

    // Generate a unique ID for the user
    $cus_ID = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    echo $cus_ID;

    // Execute the insert query to store the user's information in the database
    $stmt = $db->prepare("INSERT INTO customers (cus_ID, cus_name, cus_email, cus_question1, cus_question2, cus_answer1, cus_answer2, cus_phone, cus_pw) VALUES (?,?,?,?,?,?,?,?,?);");
    $stmt->bind_param("sssssssss", $cus_ID, $name, $email, $question1, $question2, $answer1, $answer2, $phone, $password);
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();
    
    // Close the statement and database connection
    $stmt->close();
    $db->close();
    // Redirect the user to a success page
    header('Location: thankyou.html');
    exit;

  


