<?php
include('conn.php');
include('functions.php');
session_start();
//$fname=$_POST['fname'];


if(isset($_POST['submit']))
{
$username= $_POST['username'];
$password = $_POST['password'];

//customer table

$select_query="select * from customers where username='$username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();

//cart items
$select_query_cart="select * from cart where ip_address='$user_ip'";
$select_cart= mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);


if($row_count>0){
	$_SESSION['username']=$username;
	if(password_verify($password,$row_data['password'])){
     //echo"<script>alert('login successful')</script>";


  if($row_count==0 and $row_count_cart==0){
  	$_SESSION['username']=$username;
  echo"<script>alert('login successful')</script>";
  // echo"<script>window.open('profile.php','_self')</script>";
  echo"<script>window.open('profile.php','_self')</script>";
	}
	else{
		 $_SESSION['username']=$username;
    echo"<script>alert('login successful')</script>";
    //echo"<script>window.open('payment.php','_self')</script>";
    echo"<script>window.open('cart.php','_self')</script>";

	} }
	else{
	echo"<script>alert('Invalid password!')</script>";
	echo"<script>window.open('login.php','_self')</script>";
}
}  else{
	echo"<script>alert('Invalid credentials!')</script>";
	echo"<script>window.open('login.php','_self')</script>";
}}
?>
