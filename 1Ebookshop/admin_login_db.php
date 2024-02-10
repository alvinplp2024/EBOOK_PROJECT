<?php
include('conn.php');
session_start();

include('functions.php');

if(isset($_POST['submit']))
{
$username= $_POST['username'];
$password = $_POST['password'];

//customer table
$select_query="select * from admin where name='$username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);



if($row_count>0){
//$_SESSION['username']=$username;
  if($row_data['password']===$password){
    echo"<script>alert('Login successfull!')</script>";
  echo"<script>window.open('admin_dashboard.php','_self')</script>";
 }
//   else{
//   echo"<script>alert('Invalid password!')</script>";
//   //echo"<script>window.open('dashboard.php','_self')</script>";
// }
}  else{
  echo"<script>alert('Invalid credentials!')</script>";
  echo"<script>window.open('dashboard.php','_self')</script>";
}}
?> 