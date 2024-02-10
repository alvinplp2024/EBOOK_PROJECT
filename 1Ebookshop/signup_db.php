<?php
include('conn.php');
include('functions.php');
if(isset($_POST['signup']))
{ 
$username=$_POST['username'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$hash_password= password_hash($password,PASSWORD_DEFAULT);
$cpassword=$_POST['cpassword'];
$ip_add=getIPAddress();


//selsct query 
$select_query="Select * from customers where username='$username' or email='$email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
	echo"<script>alert('Username or email already exists!')</script>";
	echo"<script>window.open('signup.php','_self')</script>";
}  else if($password!=$cpassword){
  echo"<script>alert('Passwords do not match!')</script>";
  echo"<script>window.open('signup.php','_self')</script>";
}
else{


$sql= "insert into customers (username,address,phone,email,ip_address,password) values('$username','$address','$phone','$email','$ip_add','$hash_password')";


if(mysqli_query($con,$sql)){
	echo"<script>alert('You have successfully regestered')</script>";
}
else{
	echo "ERROR $sql.".mysqli_error($con);
}

//header("location:login.php");
}

//selecting cart items
$select_cart_items="Select * from cart where ip_address='$ip_add'";
$result_cart=mysqli_query($con,$select_cart_items);
$row_count=mysqli_num_rows($result_cart);
if($row_count>0 ){
	$_SESSION['username']=$username;
	echo"<script>alert('You have items in your cart')</script>";
	echo"<script>window.open('checkout.php','_self')</script>";
} else{
	echo"<script>window.open('login.php','_self')</script>";
}

}
?>