<?php
include('conn.php');
include('functions.php');
//session_start();
//error_reporting(0);
?>

<!-- to access user id -->
 <?php 
   $user_ip=getIPAddress();
   $get_user="Select * from customers where ip_address= '$user_ip'";
   $result=mysqli_query($con,$get_user);
   $run_query=mysqli_fetch_array($result);
   $user_id= $run_query['id'];


?>

<!DOCTYPE html>
<html>
<head>
   <title>Checkout</title>
   <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--S2-->

    <?php //start session first
     if(!isset($_SESSION['username'])){
      echo "<h3>Welcome Guest</h3>";
     }
     else { echo "<h3>Welcome ".$_SESSION['username']."</h3>";
     }
    ?>

   
 	<link rel="stylesheet" type="text/css" href="pay.css">
    <!-- <link rel="stylesheet" type="text/css" href="admin_dash.css"> -->
 </head>
 <body>

 	<h3 class="text-center">Plese confirm your payment by selecting your preferred payment method in your profile</h3><br>
 	<div class="navb1">
  
  <a href="order.php?user_id=<?php echo $user_id ?>">Submit</a>
  
</div>
<br>
<div class="navb1">
  
  <a href="cart.php">Back</a>
  
</div>

<!-- <div class="container">
  <h2>Block Level Buttons</h2>
  <button type="button" class="btn btn-primary btn-block">Button 1</button>
  <button type="button" class="btn btn-default btn-block">Button 2</button>

  <h2>Large Block Level Buttons</h2>
  <button type="button" class="btn btn-primary btn-lg btn-block">Button 1</button>
  <button type="button" class="btn btn-default btn-lg btn-block">Button 2</button>

  <h2>Small Block Level Buttons</h2>
  <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
  <button type="button" class="btn btn-default btn-sm btn-block">Button 2</button>
</div>
 -->
 
 </body>
 </html>

 