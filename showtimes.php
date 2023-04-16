<style>
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

    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #f2f2f2;
  color: #333;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #ddd;
}

tr {
  border: 1px solid #ddd;
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
        </a></div></a>
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
        <a href="seat.php" class="btn btn-primary">Get Tickets</a>
      </div>
    </div>
  </nav>
</header>
</body>

<?php
// Connect to the database
$db = mysqli_connect('localhost', 'ics325sp235008', '3428', 'ics325sp235008');

// Execute the SELECT query
$result = mysqli_query($db, 'SELECT movies.movie_ID, movie_name, showDate, showTime FROM movies JOIN showtimes ON movies.movie_ID = showtimes.movie_ID;');


// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output the table headers
    echo "<table style='border-collapse: collapse;'>";
    echo "<table>";
    echo "<thead><tr><th>Movie Title</th><th>Show Date</th><th>Show Time</th></tr></thead>";
    echo "<tbody>";

    // Loop through the rows and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            echo "<tr style='border: 1px solid black;'><td>{$row['movie_name']}</td><td>{$row['showDate']}</td><td>{$row['showTime']}</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
} else {
    // Output a message if no rows were returned
    echo 'No rows found';
}

// Close the database connection
mysqli_close($db);
?>

<footer>
	<div class="container">
    <div class="footer-left">
      <div class = "center"><img src="img/movie-theater.png" alt="CINIMAX"></div>
      <p>CINIMAX Theatres® delivers distinctive and affordable movie-going experiences in 347 theatres with 4,865 screens across the United States.</p>
    </div>
    <div class="footer-right">
      <div class="social-links">
        <a href="#"><img src="img/facebook.gif" alt="facebook"></a>
        <a href="#"><img src="img/twitter.gif" alt="Twitter"></a>
        <a href="#"><img src="img/instagram.gif" alt="Instagram"></a>
        <a href="#"><img src="img/youtube.gif" alt="YouTube"></a>
      </div>
      <ul>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Press Room</a></li>
        <li><a href="#">Investor Relations</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>

    </div>
  </div>
</footer>
