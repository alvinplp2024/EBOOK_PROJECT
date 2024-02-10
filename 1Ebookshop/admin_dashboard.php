<?php
include('conn.php');
include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin dashboard</title>
	<!--bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="admin_dash.css">
</head>
<body>
  <!--navbar-->  
  	<div class="container-fluid p-0">


  		<!--f1-->	
  		<nav class="navbar navbar-expand-lg justify-content-center p-0">
  <div class="container-fluid ">
    <img src="kim.jpeg" class="kim">
    <nav class="navbar navbar-expand-lg">
    	<ul class="navbar-nav">
          <li class="nav-item">
           <a class="nav-link justify-content-center text-light" href="#"><h3>Welcome Admin</h3></a>
          </li>
        </ul>
    </nav>
  </div>
       </nav>

       <!--f1-->
       <div class="bg-light">
       	<h3 class="text-center p-2"> Manage details</h3>
       </div>
            
             <!--f3-->
    
<!-- The navigation menu -->
<div class="navb1">
  <a href="admin_dashboard.php?insert_items">Insert category</a>
  <a href="admin_dashboard.php?view_categories">View category</a>
  <a href="admin_dashboard.php?insert_book">Insert book</a>
  <a href="admin_dashboard.php?register_admin">Register an admin</a>
  <a href="admin_dashboard.php?displayitems">Display Books</a>
  <a href="admin_dashboard.php?viewusers">List users</a>
  <a href="admin_dashboard.php?all_orders">All orders</a>
  <!-- <a href="#">Total funds</a> -->
</div>
 
 <!--f1-->
 <div class="container my-3">
 	<?php
 	 if(isset($_GET['insert_items'])){
 	 	include('insert_category.php');
 	 }

    if(isset($_GET['insert_book'])){
    include('insert_book.php');
   }

    if(isset($_GET['viewusers'])){
    include('view_users.php');
   }

    if(isset($_GET['displayitems'])){
    include('viewitems.php');
   }

    if(isset($_GET['all_orders'])){
    include('all_orders.php');
   }

   if(isset($_GET['edit_product'])){
    include('edit_product.php');
   }

     if(isset($_GET['delete_product'])){
    include('delete_product.php');
   }

   if(isset($_GET['view_categories'])){
    include('view_categories.php');
   }

   if(isset($_GET['edit_category'])){
    include('edit_category.php');
   }

     if(isset($_GET['delete_category'])){
    include('delete_category.php');
   }

     if(isset($_GET['delete_all_orders'])){
    include('delete_all_orders.php');
   }

     if(isset($_GET['register_admin'])){
    include('admin_register.php');
   }
        ?>


<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>