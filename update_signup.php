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

if(isset($_POST['update_profile'])){


    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
  
    mysqli_query($conn, "UPDATE  `registered_customer` SET name ='$update_name',  email = '$update_email' WHERE id = '$user_id'")or die('query failed');

    $old_pass =$_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
}   
if(!empty($update_pass)|| !empty($new_pass) || !empty($confirm_pass)){
   if($update_pass != $old_pass){
     $message[] =    'old password not matched';

   }elseif($new_pass != $confirm_pass){
    $message[] =    'confirm password not matched';
   }else{
    mysqli_query($conn, "UPDATE  `registered_customer` SET password ='$confirm_pass' WHERE id = '$user_id'")or die('query failed');
    $message[] =    'password updated successfully!';
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
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
width:740px;


}
.delete-btn:hover{
background-color: darkred;
}

.message{
margin: 5px 0;
width:100%;
height: 25%;
border-radius: 5px;
padding: 10px;
text-align:center;
background-color: red;
color: white;
font-size:20px ;
top: 10px;


}



.btn{
background-color:blue;


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
height: 100px;
width: 100px;
border-radius: 50%;
object-fit: cover;
margin-bottom: 6px;
align-items: left;
}

.update_profile{
min-height: 100vh;
background-color:lightskyblue;
display:flex;
align-items:center;
justify-content:center;
padding:20px;
border-radius:5px;

}
.update_profile form{
    padding:20px;
background-color:azure;
text-align: center;
width: 800px;
text-align: center;
border-radius: 5px;
}

.update_profile form img{
    height: 200px;
    width: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

.update_profile form .flex{
display: flex;

justify-content: space-between;
margin-bottom: 20px;
gap: 15px;

}

.update_profile form .flex .inputBox{
width: 50%;
}
.update_profile form .flex .inputBox span{
    text-align: left;
    display: block;
    margin-top:15px;
    font-size: 17px;
    color: black;

}

.update_profile form .flex .inputBox .box {
    width:75% ;
    border-radius: 5px;
    background-color: lightgray;
padding: 12px 14px;
font-size: 17px;
color: black;
margin-top: 10px;
}


</style>
</head>
<body>
 <div class="update_profile">
 <?php
        $select = mysqli_query($conn, "SELECT *FROM `registered_customer` WHERE id ='$user_id'")or die('query failed');
      if(mysqli_num_rows($select)> 0){
        $fetch = mysqli_fetch_assoc($select);
      }
      
      
      
      ?>

      <form action="" method="post" enctype="multipart/form-data">
    <div class="flex">
        <?php
        
        if($fetch ['image'] == ''){
            echo '<img src="C:\xampp\htdocs\ie\use.jpg">';
          }else{
            echo '<img src= "uploaded_img/'.$fetch['image'].'">';
          } 
          if(isset($message)){
              foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
              }
              
              
          }
        
        ?>
        <div class="inputBox">
         <span>username :</span>
         <input type="text" name="update_name" value="<?php echo $fetch['name'] ?>" class="box">

         <span>your email :</span>
         <input type="email" name="update_email" value="<?php echo $fetch['email'] ?>" class="box">
        
         <span>update your image :</span>
         <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
        
        </div>
        <div class="inputBox">
      <input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>"> 
    
      <span> old password: </span>
      <input type="password" name="update_pass" placeholder="enter previous password" class="box">
    
      <span> new password: </span>
      <input type="password" name="new_pass" placeholder="enter new password" class="box">
    
      <span> confirm password: </span>
      <input type="password" name="confirm_pass" placeholder="confirm password" class="box">
    
    
    </div>
    </div>
    <input type="submit" value="update profile" name="update_profile" class ="btn">
    <a href="home.php" class="delete-btn">go back</a>
    </form>

 </div>

</body>
</html>