<?php
  $hostname = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "chat_db";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
