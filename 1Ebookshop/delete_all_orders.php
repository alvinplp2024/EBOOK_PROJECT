<?php

if(isset($_GET['delete_all_orders'])){
 
$deletet_id=$_GET['delete_all_orders'];

$delete_product="DELETE FROM payment WHERE order_id=$deletet_id";
$result= mysqli_query($con,$delete_product);
if($result){
		echo"<script>alert('Order deleted successfully.')</script>";	
		echo"<script>window.open('admin_dashboard.php','_self')</script>";
		}

 }

?>