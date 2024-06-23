<!


Project Group ID : MET_WD_01.01_04
  Batch No. : Y1.S2.WD.IT
  Member ID : It22359360
  Member Name : kavithanjali
  
                  
> 
<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    
 
    $select = mysqli_query($conn, "SELECT *FROM `registered_customer`  WHERE email='$email' AND password='$pass'")or die('query failed');


    if(mysqli_num_rows($select) > 0 ){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['user_id'] = $row['id'];
       header('location: home.php');


    }else{
        $message[]='incorrect email or password';
    }
   
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
    .form-container {
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

}
.btn:hover{
    background-color: darkblue;
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
</style>
</head>

<body>
    <div class="form-container">
       <form action="" method="post" enctype="multipart/form-data">
            <h3>Login now</h3>
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
                
                
            }
            ?>

        <input type="text" name="name" placeholder="enter username" class="box" required>
        <input type="email" name="email" placeholder="enter email" class="box" required>
        <input type="password" name="password" placeholder="enter password" class="box" required>
            
        
        <input type="submit" name="submit" value="login now" class="btn">
        <p>dont have an account<a href="hi.php">register now</a></p>
      </form>
    
    </div>


    
</body>
</html>