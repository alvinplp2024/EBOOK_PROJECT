<?php
include('conn.php');
include('functions.php');
session_start();
//error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart details</title>
	<!--bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- font awsome link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="dashboard.css">
  <style>
    .cart_img{
  width:80px;
  height: 80px;
  object-fit: contain;
}
  </style>
</head>
<body>
  <!--navbar-->
  	<div class="container-fluid p-0">


  		<!--f1-->
      <nav class="navbarz navbar-expand-lg navbar-dark p-0">
  <div class="container-fluid d-flex">
    <img src="kim.jpeg" class="kim">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="dashboard.php"><h4>Home</h4></a>
        </li>
        <!-- <li class="nav-item mx-2">
          <a class="nav-link" href="#"><h5>News</h5></a>
        </li>
        
        <li class="nav-item mx-2" >
          <a class="nav-link" href="#"><h5>Contact</h5></a>
        </li> -->

               
        <li class="nav-item mx-2">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_number(); ?></sup></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link nav-justified"><h5>Total price: <?php total_price(); ?>/-</h5></a>
        </li>

        <?php
        if(isset($_SESSION['username'])){
         echo "<li class='nav-item mx-2'>
          <a class='nav-link' href='profile.php'><h5><i class='fa fa-user-circle' aria-hidden='true'></i>
            Account</h5></a>
        </li>";
        } else{
           echo "<li class='nav-item mx-2'>
          <a class='nav-link' href='signup.php'><h5>Register</h5></a>
        </li>";        }

      ?>
        

         
        
      </ul>      
    </div>
  </div>
</nav>



<!--S2-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary"> 
  <ul class="navbar-nav me-auto">
   <?php  
   //remember to start the session
   
     if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
          <a class='nav-link' href='#''><h5>Welcome Guest</h5></a>
        </li>";
     }
     else { echo "<li class='nav-item'>
          <a class='nav-link' href='#''><h5>Welcome ".$_SESSION['username']."</h5></a>
        </li>";
     }

     if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
          <a class='nav-link' href='login.php'><h5>Login</h5></a>
        </li>";
     }else{ echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'><h5>Logout</h5></a>
        </li>";
      }


    ?>
    </ul>
</nav>
<!--f3-->
<div class="bg-light">
  
	<h3 class="text-center">Kimathi Bookshop</h3>
	<p class="text-center">Knowledge is power</p>
</div>



  <!--table-->
  <div class="container">
    <div class="row">
      <form action="" method="post">
      <table class="table table-bordered text-center">
        
          <!-- php code to display dynamic data-->
          <?php 
           global $con;   // must whenever creating new function
    $get_ip_address = getIPAddress();
    $total_price=0;
    $cart_query="Select * from cart where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
      echo "<thead>
          <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
          </tr>
        </thead>
        <tbody>";


    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from items where item_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['price']);  
            $product_table=$row_product_price['price'];  
            $product_title=$row_product_price['title'];
            $product_image=$row_product_price['image']; 
            $product_values=array_sum($product_price);        
            $total_price+=$product_values;                      

        
          ?>
          <tr>
            <td><?php echo $product_title ?></td>
            <td><img src="upload/<?php echo $product_image ?>" class="cart_img"></td> 
                                                          <!--<img src="../e-voting/upload/girl.png">-->
            <td><input type="number" name="quantity" class="form-input w-50"></td>
            <?php 
             $get_ip_address = getIPAddress();
             if(isset($_POST['update_cart'])){
              $quantities=$_POST['quantity'];  //accessing value stored in input and storing in variable
              $update_cart="update cart set quantity=$quantities where ip_address='$get_ip_address'";
              $result_products_quantities=mysqli_query($con,$update_cart);
              $total_price= $total_price * $quantities;                       //have to update price as well
                }
             ?>
            <td><?php echo $product_table ?>/-</td>
            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td> <!--array squarebrackets to store/remove multiple items & when you check you'll be accessing particular id from db-->
            <td> <!--<button class="bg-primary text-light px-3 py-2 mx-3 border-0">Update</button>-->
                 <input type="submit" value="Update cart" name="update_cart" class="bg-primary text-light px-3 py-2 mx-3 border-0">
                 <!--<button class="bg-primary text-light px-3 py-2 mx-3 border-0">Delete</button>-->
                 <input type="submit" value="Remove" name="remove_cart" class="bg-primary text-light px-3 py-2 mx-3 border-0">
            </td>
          </tr>
          <?php               //close it here so while loop can display all the data
        } }                   // can also use echo, pass all the data in the double quotes then change 
        } 
        else{
          echo "<h2 class='text-center text-danger'>Your cart is empty</h2>";
        }                   //..all double quotes to single quotes
        ?>
        </tbody>
      </table>

      <div class="d-flex mb-5">    <!--  d-flex enables them to be alignrd horizontally  -->
        <?php 
        
        $get_ip_address = getIPAddress();
    $cart_query="Select * from cart where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
      echo "<h4 class='px-3'>Subtotal:<strong class='text-success'>$total_price /-</strong></h4>
        <input type='submit' value='Continue shopping' name='Continue_shopping' class='bg-primary text-light px-3 py-2 mx-3 border-0'>
        <button class='bg-primary p-3 py-2 border-0'><a href='checkout.php' class='text-light text-decoration-none'> Checkout</a></button>";
    }else{
      echo "<input type='submit' value='Continue shopping' name='Continue_shopping' class='bg-primary text-light px-3 py-2 mx-3 border-0'>";
    }
      if(isset($_POST['Continue_shopping'])){
        echo "<script>window.open('dashboard.php','_self')</script>";  
              //necessary bcz we are using input as submit button
      }

        ?>
        
      </div>
    </div>
  </div>
</form>

<!--function to remove items-->
<?php 
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach ($_POST['removeitem'] as $remove_id) {  //didn't pass square brackets as it will be executed multiple times
    echo $remove_id;
    $delete_query="Delete from cart where product_id=$remove_id";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
      echo "<script>window.open('cart.php','_self')</script>";
    }
    }
  }
}
echo $remove_item=remove_cart_item();           //calling the function

?>

  
</nav>
<!--  -->
 <div class="footer mb-0">
  <p> All Rights Reserved ©- Designed by Mwonga,Kaunda & Chemosol- 2022</p>
</div>


<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
