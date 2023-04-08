<style>
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