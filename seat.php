<!DOCTYPE html>
<html>
<head>
  <title>Sign In - Cinema Name</title>
  <!--Pulls the css style sheet-->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<style>
  img {
    display: block;
    margin-left: auto;
    margin-right: auto;
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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CINIMAX Theatres - Welcome to the Movies</title>
  <link rel="stylesheet" href="css\main.css">
</head>
<body>
<header>
  <nav style="background: #8b4545;;">
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
          <li><a href="SIGIN.html" class="btn btn-secondary">Sign In</a></li>
          <li><a href="seat.php" class="btn btn-primary">Get Tickets</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
</body>

<head>
  <title>Movie Ticket Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center;
      color: #008CBA;
    }
    table {
      margin: auto;
      border-collapse: collapse;
      border: 2px solid #008CBA;
      background-color: white;
    }
    td {
      padding: 10px;
      text-align: center;
    }
    input[type="checkbox"] {
      transform: scale(2);
    }
    input[type="submit"] {
      display: block;
      margin: auto;
      padding: 10px 20px;
      background-color: #008CBA;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #005F6B;
    }
  </style>
</head>
<body>
<h1>Movie Ticket Booking</h1>
<form method="post" action="book_ticket.php">
  <table>
    <tr>
      <td>Screen</td>
      <td colspan="5"></td>
      <td>Wheelchair</td>
      <td colspan="5"></td>
    </tr>
    <tr>
      <td></td>
      <td>A1</td>
      <td>A2</td>
      <td>A3</td>
      <td>A4</td>
      <td>A5</td>
      <td></td>
      <td>W1</td>
      <td>W2</td>
      <td>W3</td>
      <td>W4</td>
      <td>W5</td>
    </tr>
    <tr>
      <td>Row 1</td>
      <td><input type="checkbox" name="seats[]" value="A1" <?php if(!isAvailable('A1')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="A2" <?php if(!isAvailable('A2')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="A3" <?php if(!isAvailable('A3')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="A4" <?php if(!isAvailable('A4')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="A5" <?php if(!isAvailable('A5')) echo 'disabled'; ?>></td>
      <td rowspan="4"><input type="checkbox" name="seats[]" value="W1" <?php if(!isAvailable('W1')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W2" <?php if(!isAvailable('W2')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W3" <?php if(!isAvailable('W3')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W4" <?php if(!isAvailable('W4')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W5" <?php if(!isAvailable('W5')) echo 'disabled'; ?>></td>
    </tr>
    <tr>
      <td>Row 2</td>
      <td><input type="checkbox" name="seats[]" value="B1" <?php if(!isAvailable('B1')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="B2" <?php if(!isAvailable('B2')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="B3" <?php if(!isAvailable('B3')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="B4" <?php if(!isAvailable('B4')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="B5" <?php if(!isAvailable('B5')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W6" <?php if(!isAvailable('W6')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W7" <?php if(!isAvailable('W7')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W8" <?php if(!isAvailable('W8')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W9" <?php if(!isAvailable('W9')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W10" <?php if(!isAvailable('W10')) echo 'disabled'; ?>></td>
    </tr>
    <tr>
      <td>Row 3</td>
      <td><input type="checkbox" name="seats[]" value="C1" <?php if(!isAvailable('C1')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="C2" <?php if(!isAvailable('C2')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="C3" <?php if(!isAvailable('C3')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="C4" <?php if(!isAvailable('C4')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="C5" <?php if(!isAvailable('C5')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W11" <?php if(!isAvailable('W11')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W12" <?php if(!isAvailable('W12')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W13" <?php if(!isAvailable('W13')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W14" <?php if(!isAvailable('W14')) echo 'disabled'; ?>></td>
      <td><input type="checkbox" name="seats[]" value="W15" <?php if(!isAvailable('W15')) echo 'disabled'; ?>></td>

    </tr>
  </table>
  <input type="submit" value="Book Selected Seats">
</form>

