<?php
require_once 'Database.php';

// Define variables and initialize with empty values
$name = $email = $phone = $password = $question1 = $question2 =$answer1=$answer2= "";
$nameErr = $emailErr = $phoneErr = $passwordErr = $questionErr =$answer1err=$answer2err= "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // Check if phone number is well-formed
        if (!preg_match("/^[0-9]*$/", $phone)) {
            $phoneErr = "Only numbers allowed";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Check if password meets standards
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
            $passwordErr = "Password must be at least 8 characters, contain at least one lowercase letter, one uppercase letter, and one number";
        }
    }

    // Validate questions
    if (empty($_POST["question1"]) || empty($_POST["question2"])) {
        $questionErr = "Please choose two questions";
    } else {
        $question1 = test_input($_POST["question1"]);
        $question2 = test_input($_POST["question2"]);
    }
  if (empty($_POST["answer1"])){
    $answer1err = "Answer is Required";
  } else {
    $answer1 = test_input($_POST["answer1"]);
  }
  if (empty($_POST["answer2"])){
    $answer2err = "Answer is Required";
  } else {
    $answer2 = test_input($_POST["answer2"]);
  }

    // If there are no errors, store the user's information in the database
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr) && empty($questionErr)) {
        // Create a new database connection
        $db = new Database("localhost", "username", "password", "database_name");

        // Generate a unique ID for the user
        $cus_ID = uniqid();

        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Execute the insert query to store the user's information in the database
        $query = "INSERT INTO customerss (cus_ID, cus_name, cus_email, cus_question1, cus_question2,cus_answer1,cus_answer2,cus_phone, cus_pw) VALUES ('$cus_ID', '$name', '$email', '$question1', '$question2',$answer1,$answer2,'$phone', '$hash')";
        $db->execute($query);

        // Close the database connection
        unset($db);

        // Redirect the user to a success page

        header('Location: thankyou.html');
    exit;

  }
}


