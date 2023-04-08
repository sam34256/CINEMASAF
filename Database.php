<?php
class Database {
  private $host = "localhost";
  private $username = "ics325sp235008";
  private $password = "3428";
  private $database = "ics325sp235008";
  private $conn;

  public function __construct($host, $username, $password, $database) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;

    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function execute($query) {
    $result = $this->conn->query($query);

    if (!$result) {
      die("Query failed: " . $this->conn->error);
    }

    return $result;
  }

  public function __destruct() {
    $this->conn->close();
  }
}

