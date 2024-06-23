
<?php

$standardroomvalue = 7500.00;

// Create connection
$conn = new mysqli("localhost", "root", "", "hotel_reservation");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO standard_room(standardroomvalue)
VALUES ($standardroomvalue)";

if ($conn->query($sql) === TRUE) {
  
  include 'Confirmation.html';
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>