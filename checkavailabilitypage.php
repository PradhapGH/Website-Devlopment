<!


Project Group ID : MET_WD_01.01_04
  Batch No. : Y1.S2.WD.IT
  Member ID : IT22337108
  Member Name : Pradhap Ramasamy
  Contact No. :  0774572488
  Address : 92/31a st mary's lane mattakuliya colombo-15
  Functions Implemented : insert into the database
                  
>    

<?php

$rooms = $_POST['rooms'];
$guest = $_POST['guest'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];


// Create connection
$conn = new mysqli("localhost", "root", "", "hotel_reservation");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO checkavailability (rooms, guest, checkin, checkout)
VALUES ($rooms, $guest, $checkin, $checkout)";

if ($conn->query($sql) === TRUE) {
  
  include 'Selection page.html';
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
