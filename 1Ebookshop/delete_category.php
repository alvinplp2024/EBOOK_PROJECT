<?php

if(isset($_GET['delete_category'])){
 
$deletet_id=$_GET['delete_category'];

$delete_cate="DELETE FROM categories WHERE id=$deletet_id";
$result= mysqli_query($con,$delete_cate);
if($result){
		echo"<script>alert('Category deleted successfully.')</script>";	
		echo"<script>window.open('admin_dashboard.php','_self')</script>";
		}

 }

?>