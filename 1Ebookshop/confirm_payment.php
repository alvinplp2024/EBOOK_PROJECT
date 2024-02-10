<?php
include('conn.php');
session_start();
if(isset($_GET['order_id'])){
	$order_id= $_GET['order_id'];
	
}
$Select_data ="select * from myorder where order_id='$order_id'";
$result=mysqli_query($con ,$Select_data);
$row_fetch=mysqli_fetch_assoc($result);
$invoice_number= $row_fetch['invoice_number'];
$shopping_fee= $row_fetch['shopping_fee'];

if(isset($_POST['confirm_payment'])){
$invoice_number= $_POST['invoice_number'];
$amount= $_POST['amount'];             
$payment_mode= $_POST['payment_mode'];

$insert_data ="insert into payment (order_id,invoice_number,amount,payment_mode) VALUES ('$order_id','$invoice_number','$amount','$payment_mode')";
$result=mysqli_query($con ,$insert_data);

if($result){
	
        echo"<script>alert('Successfully completed the payment')</script>";

	echo"<script>window.open('profile.php?my_orders','_self')</script>";
} 
$update_orders="update myorder set order_status='Complete' where order_id=$order_id";
$result_orders=mysqli_query($con ,$update_orders);

}


?>

<!DOCTYPE html>
<html>
<head>
   <title>Payment Page</title>
   <!--bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



   
 	<link rel="stylesheet" type="text/css" href="pay.css">
    <!-- <link rel="stylesheet" type="text/css" href="admin_dash.css"> -->
 </head>
 <body>

 	
 	<div class="container my-5">
 		<h3 class="text-center">Confirm Payment</h3>
      <form action="" method="post">
        <div class="form-outline my-4 text-center w-50 m-auto">
        	<label>Invoice number</label>
        <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number  ?>" readonly />
 	    </div>
 	    <div class="form-outline my-4 text-center w-50 m-auto">
 	    	<label>Amount</label>
        <input type="text" class="form-control w-50 m-auto" name="amount"  value="<?php echo $shopping_fee ?>" readonly/>
 	    </div>

 	    <div class="form-outline my-4 text-center w-50 m-auto">
 	     <label>Select payment mode</label>
 	    
        <select name="payment_mode" class="form-select w-50 m-auto">
        	<!-- <option value="">Select payment mode</option> -->
        	<option value="M-pesa">M-pesa</option>
        	<option value="Credit card">Credit card</option>
        	<option value="Cash on delivery">Cash on delivery</option>

        </select>
 	    </div>

 	    <div class="form-outline my-4 text-center w-50 m-auto">
 	    	
        <input type="submit" class="bg-success py-2 px-2 border-0 w-50 m-auto" value="Confirm" name="confirm_payment" />
 	    </div>
 </form>
 	

 
 </body>
 </html>


