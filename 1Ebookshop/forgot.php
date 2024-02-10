<?php 
include('conn.php');

if(isset($_POST['submit'])){
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if($password!=$cpassword){
  echo"<script>alert('Passwords do not match')</script>";
  echo"<script>window.open('forgot.php','_self')</script>";
} else{
  $sql="UPDATE customers SET password='$_POST[password]' WHERE email='$_POST[email]'";
  $result=mysqli_query($con, $sql);
  
  if($result){
  
    echo"<script>alert('Password updated successfully')</script>";
  echo"<script>window.open('login.php','_self')</script>";
     
} 
 else{ 
    echo"<script>alert('Unable to updated password')</script>";
  echo"<script>window.open('forgot.php','_self')</script>";
     }
  }
}
 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forgot password</title>
    <link rel="stylesheet" href="siglog.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-box">
      <h1>Forgot password</h1>
      <form>
        <label>Email</label>
        <input type="email" placeholder="" name="email" />
        <label>Password</label>
        <input type="password" placeholder="" name="password" />
        <label> Confirm Password</label>
        <input type="password" placeholder="" name="cpassword"/>
        
        <input type="submit" value="Reset" name="submit" />
      
    
    <p class="per-1" style="color: mediumvioletred;">
      <b><a href="login.php">Back to login</a></b>
    </p>
    </form>
    </div>
  </body>
</html>