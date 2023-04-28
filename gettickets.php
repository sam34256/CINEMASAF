<style>

form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
}

select,
input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

.error {
  color: red;
  margin-bottom: 10px;
}

div.center {
  text-align: center;  
  }

.hero{
  width:100vw;
  height:40vh;
}

.nav-buttons{
  position: absolute;
  top: 22px;
  right: 16px;
}

.posters{

    height: 85%;
    width: 30%;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CINIMAX Theatres - Welcome to the Movies</title>
  <link rel="stylesheet" href="css\main.css">
</head>

<body>
<header>
  <nav style="background: #8b4545;">
    <div class="container" >
      <div class="logo">
        <div class = "center">
        <a href="index.html">
        <img src="img/movie-theater.png" alt="Logo">
        </a>
        </div>
    </a>
      </div>
      <div class="nav-items">
        <ul>
          <li><a href="nowplaying.html">Now Playing</a></li>
          <li><a href="comingsoon.html">Coming Soon</a></li>
          <li><a href="concession.html">Concession Menu</a></li>
          <li><a href="ABOUTUS.html">About Us</a></li>
        </ul>
      </div>
      <div class="nav-buttons">
        <a href="SIGIN.html" class="btn btn-secondary">Sign In</a>
        <a href="gettickets.php" class="btn btn-primary">Get Tickets</a>
      </div>
    </div>
  </nav>
</header>


<?php
// Connect to database
$db_host = 'localhost';
$db_name = 'ics325sp235008';
$db_user = 'ics325sp235008';
$db_pass = '3428';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Get list of movies and showtimes
$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM showtimes";
$result = mysqli_query($conn, $sql);
$showtimes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


// session_start();
    
//     // Check if the user is authenticated
// if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
//     //If the user is not authenticated, redirect them to the login page
//        header('Location: SIGIN.html');
//        exit;
//    }
  
    // Get user input
  $movie_id = $_POST['movie_id'];
  $showtime_id = $_POST['showtime_id'];
  $quantity = $_POST['quantity'];
  //$cus_id = $_SESSION['cus_ID'];
  $cus_id = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
  $ticket_ID = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

  // //verifys that user inputted a number
  // if(!is_numeric($quantity)){
  //   $error_msg = "Please enter a number for the quantity of tickets";
  //   trigger_error($error_msg, E_USER_ERROR);
  // }

  //gets the total cost of tickets
  $total = $quantity * 9.99;


  // Create new ticket record
  $sql = "INSERT INTO tickets (ticket_ID, cus_ID, showtime_ID, total, quantity) VALUES ('$ticket_ID','$cus_id', '$showtime_id', '$total', '$quantity')";
  mysqli_query($conn, $sql);

  // Update number of seats in theater
  $sql = "UPDATE theaters SET numberOfSeats = numberOfSeats - '$quantity' WHERE theater_ID = (SELECT theater_ID FROM showtimes WHERE showtime_ID = '$showtime_id')";
  mysqli_query($conn, $sql);

  // Set confirmation message
  $movie_name = mysqli_fetch_array(mysqli_query($conn, "SELECT movie_name FROM movies WHERE movie_ID = '$movie_id'"))['movie_name'];
  $show_datetime = mysqli_fetch_array(mysqli_query($conn, "SELECT CONCAT(showDate, ' ', showTime) AS show_datetime FROM showtimes WHERE showtime_ID = '$showtime_id'"))['show_datetime'];
  $confirmation_msg = "You have reserved $quantity tickets for the movie $movie_name on $show_datetime. Total cost: $" . number_format($total, 2);

  echo '<script>alert("' . $confirmation_msg . '");</script>';

  mysqli_close($conn);

}
?>


<form method="post" action = "gettickets.php">
  <label for="movie_id">Select a movie:</label>
  <select name="movie_id" required>
    <?php foreach ($movies as $movie): ?>
      <option value="<?php echo $movie['movie_ID']; ?>"><?php echo $movie['movie_name']; ?></option>
    <?php endforeach; ?>
  </select>

  <label for="showtime_id">Select a showtime:</label>
  <select name="showtime_id" required>
    <?php foreach ($showtimes as $showtime): ?>
      <option value="<?php echo $showtime['showtime_ID']; ?>"><?php echo $showtime['showDate'] . ' ' . $showtime['showTime']; ?></option>
    <?php endforeach; ?>
  </select>

  <label for="quantity">Number of tickets:</label>
  <input type="number" name="quantity" required>
  <input type="submit" value="Reserve Tickets">
</form>