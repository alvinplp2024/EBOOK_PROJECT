<?php

if(isset($_GET['delete_product'])){
 
$deletet_id=$_GET['delete_product'];

$delete_product="DELETE FROM items WHERE item_id=$deletet_id";
$result= mysqli_query($con,$delete_product);
if($result){
		echo"<script>alert('Product deleted successfully.')</script>";	
		echo"<script>window.open('admin_dashboard.php','_self')</script>";
		}

 }

?>