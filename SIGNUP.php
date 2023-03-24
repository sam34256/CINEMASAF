<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get user input
  $name = htmlspecialchars($_POST['name']);
  $phone = htmlspecialchars($_POST['phone']);
  $password = htmlspecialchars($_POST['password']);

  // Validate input
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Please enter your name.';
  }
  if (empty($phone)) {
    $errors[] = 'Please enter your phone number.';
  } else if (!preg_match('/^\d{10}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
  }
  if (empty($password)) {
    $errors[] = 'Please enter a password.';
  }

  if (count($errors) == 0) {
    // DATABASE

    // Redirect to a thank-you page or login page
    header('Location: thankyou.html');
    exit;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Cinimax Theaters Signup</title>
  <link rel="stylesheet" type="
"text/css" href="SIGNUP.css">

</head>
<body>
<div class="container">
  <h1>Signup for Cinimax Theaters</h1>
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($errors) > 0): ?>
    <div class="errors">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>
    <button type="submit">Submit</button>
  </form>
</div>
</body>
</html>
