
<!


Project Group ID : MET_WD_01.01_04
  Batch No. : Y1.S2.WD.IT
  Member ID : It22359360
  Member Name : kavithanjali
  
                  
> 
<?php
$email = $_POST['mail'];
$password = $_POST['pwd'];

$con = new mysqli("localhost", "root", "", "hotel_reservation");

if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM registration WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['password'] === $password) {
                include 'home.html';
            } else {
                echo "<h1>Invalid Email or Password</h1>";
            }
        } else {
            echo "<h1>Invalid Email or Password</h1>";
        }
    } else {
        echo "<h1>Failed to prepare the statement.</h1>";
    }
}
?>
