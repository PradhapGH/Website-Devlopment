<!


Project Group ID : MET_WD_01.01_04
  Batch No. : Y1.S2.WD.IT
  Member ID : It22359360
  Member Name : kavithanjali
  
                  
> 

<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
     header('location:login.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>

    .container {
    min-height: 100vh;
    background-color:lightskyblue;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;
    border-radius:5px;


}

.form-container form{
    padding:20px;
    background-color:azure;
    box-shadow:0cm;
    text-align: center;
    width: 600px;
    
    border-radius: 5px;
}

.form-container form h3{
    margin-top:10px;
    font-size: 30px;
    color:black;
    text-transform: uppercase;
}

.form-container .box{
    width:95%;
    border-radius: 5px;
    padding: 12px 14px;
    font-size: 18px;
    color: black;
    margin:10px 0;
    background-color: lightgrey;
}

.btn,
.delete-btn{
    width:100%;
    border-radius: 5px;
    padding:10px 30px;
    color: white;
    display: block;
    text-align: center;
    cursor: pointer;
    font-size: 20px;
    margin-top: 10px;
}

.delete-btn{
    background-color:red;

}
.delete-btn:hover{
    background-color: darkred;
}
.message{
    margin: 5px 0;
    width:100%;
    border-radius: 5px;
    padding: 10px;
    text-align:center;
    background-color: red;
    color: white;
    font-size:20px ;


}



.btn{
    background-color:blue;
    width:350px;

}
.btn:hover{
    background-color: darkblue;
}

.form-container {
    min-height: 100vh;
    background-color:lightskyblue;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;
    border-radius:5px;
}
.form-container form p{
    margin-top: 15px;
    font-size: 20px;
    color:black;

}

.form-container form p a{
    color:red;

}
.form-container form p a:hover{
    text-decoration:underline ;
}
.container .profile{
    padding:20px;
    background-color:azure;
    text-align: center;
    width: 400px;
    border-radius: 5px;
}
.container .profile img{
    height: 150px;
    width: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 5px;
}
</style>
    
</head>

<body>
    <div class ="container">
       <div class="profile">
        <?php
        $select = mysqli_query($conn, "SELECT *FROM `registered_customer` WHERE id ='$user_id'")or die('query failed');
      if(mysqli_num_rows($select)> 0){
        $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch ['image'] == ''){
        echo '<img src="C:\xampp\htdocs\ie\use.jpg">';
      }else{
        echo '<img src= "uploaded_img/'.$fetch['image'].'">';
      }
      
      
      ?>
      <h3> <?php echo $fetch['name'];?></h3>
      <a href="uprofile.php" class="btn">update profile</a>
      <p>    </p>
      <a href="login.php" class="btn">back to login page</a>
      </div>
    </div>
</body>
</html>