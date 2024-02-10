<?php
include('conn.php');
//error_reporting(0);
//if(isset($_POST['insert_product'])){
$title=$_POST['title'];
$description=$_POST['description'];
$keyword=$_POST['keyword'];
$categories=$_POST['categories'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$price=$_POST['price'];
$photo="upload/".$image; //image path

//checking if any field is empty / all fields to be filled
//if($title=='' or $description=='' or $keyword=='' or $categories=='' or $image=='' or $author=='' or $publisher=='' or $price==''){
	//echo "<script>alert('Please fill all the available fields')</script>";
    // exit()
//} else{

move_uploaded_file($tmp_name,$photo);                 //category

$select_query="Select * from items where title='$title'";
$result_select= mysqli_query($con,$select_query);
$number= mysqli_num_rows($result_select);
  
  if($number>0){
    echo " <script>alert('This book is already present')</script>";
    echo"<script>window.open('admin_dashboard.php','_self')</script>";
  } else{

$sql="insert into items (title, description, keyword, category, image, author, publisher, price) values
('$title','$description','$keyword','$categories','$image','$author','$publisher', '$price')";

$result=mysqli_query($con, $sql);

 
if($result){
	echo "<script>alert('Book details have been inserted successfully')</script>";
	 echo"<script>window.open('admin_dashboard.php','_self')</script>";
	// echo"<script>window.open('insert_book.php','_self')</script>";
	
	}
	 else{
	 	echo "Unable to insert";
	 	echo"<script>window.open('admin_dashboard.php','_self')</script>";
	 	
	 }
	}
	
?>