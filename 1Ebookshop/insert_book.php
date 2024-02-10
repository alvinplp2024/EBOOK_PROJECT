<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert books</title>

	<!--bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="dashboard.css">

</head>


<body class="bg-light">
 <div class="container mt-3">
 	<h1 class="text-center"> Insert Book</h1>

 	<form action="insert_bk_db.php" method="post" enctype="multipart/form-data">
 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="title" class="form-label">Product title</label>
 			<input type="text" name="title" id="title" class="form-control shadow-none" placeholder="Enter product title" autocomplete="off" required>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="Description" class="form-label">Description</label>
  <textarea type="text" name="description" class="form-control shadow-none" id="Description" rows="3" placeholder="Enter the description" autocomplete="off" required></textarea>
</div><br>

<div class="form-outline mb4 w-50 m-auto">
 			<label for="keyword" class="form-label">Product keyword</label>
 			<input type="text" name="keyword" id="keyword" class="form-control shadow-none" placeholder="Enter Product keyword" autocomplete="off" required>
 		</div><br>
  
  <div class="form-outline mb4 w-50 m-auto">
  	       <label for="categories" class="form-label">Choose the category</label>
 			<select name="categories" id="categories" class="form-select">
 				
 				<?php  
 				include('conn.php');
           $select_query="Select * from categories";
           $result_query=mysqli_query($con, $select_query);
           while($row=mysqli_fetch_assoc($result_query)){
             $cat_name=$row['name'];
             $cat_id=$row['id'];
             echo "<option value='$cat_id'>$cat_name</option>";
           }

 				?>
 				
 				
 			</select>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="image" class="form-label">Image</label>
 			<input type="file" name="image" id="image" class="form-control shadow-none" accept=".jpeg, .png, .jpg" required>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="author" class="form-label">Author</label>
 			<input type="text" name="author" id="author" class="form-control shadow-none" placeholder="Enter the Author" autocomplete="off" required>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="publisher" class="form-label">Publisher</label>
 			<input type="text" name="publisher" id="publisher" class="form-control shadow-none" placeholder="Enter the Publisher" autocomplete="off" required>
 		</div><br>


 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="price" class="form-label">Price</label>
 			<input type="number" name="price" id="price" class="form-control shadow-none" placeholder="Enter the Price" autocomplete="off" required>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<input type="submit" name="insert_product" class="button1" value="Insert product">
 		</div><br>

 	</form>
 </div>
</body>
</html>