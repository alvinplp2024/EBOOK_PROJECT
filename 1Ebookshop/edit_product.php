<?php

if(isset($_GET['edit_product'])){
	$edit_id=$_GET['edit_product'];
	$get_data="Select * from items where item_id=$edit_id";
	$result= mysqli_query($con,$get_data);
	$row=mysqli_fetch_assoc($result);
	$title=$row['title'];
	$description=$row['description'];
	$keyword=$row['keyword'];
	$category=$row['category'];
	$image=$row['image'];
	$author=$row['author'];
	$publisher=$row['publisher'];
	$price=$row['price'];

	//fetching category id
	$select_category= "select * from categories where id=$category";
	$result_category=mysqli_query($con ,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category=$row_category['name'];
    // $cat_name=$row['name'];
    //          $cat_id=$row['id'];


}

?>



<body class="bg-light">
 <div class="container mt-3">
 	<h1 class="text-center">Edit book</h1>

 	<form action="" method="post" enctype="multipart/form-data">
 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="title" class="form-label">Product title</label>
 			<input type="text" name="title" id="title" value="<?php echo $title ?>" class="form-control shadow-none" placeholder="Enter product title" autocomplete="off" >
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="Description" class="form-label">Description</label>
  <input type="text" name="description" value="<?php echo $description ?>" class="form-control shadow-none" id="Description" rows="3" placeholder="Enter the description" autocomplete="off" ></input>
</div><br>

<div class="form-outline mb4 w-50 m-auto">
 			<label for="keyword" class="form-label">Product keyword</label>
 			<input type="text" name="keyword" id="keyword" value="<?php echo $keyword ?>" class="form-control shadow-none" placeholder="Enter Product keyword" autocomplete="off" >
 		</div><br>
  
  <div class="form-outline mb4 w-50 m-auto">
  	       <label for="categories" class="form-label">Choose the category</label>
 			<select name="categories" id="categories" class="form-select">
 				<option value="<?php echo $category ?>"><?php echo $category ?></option>
 				<?php 
 				$select_category_all= "select * from categories";
	            $result_category_all=mysqli_query($con ,$select_category_all);
                while ($row_category_all=mysqli_fetch_assoc($result_category_all)) {
                	$category_name=$row_category_all['name'];
                	$category_id=$row_category_all['id'];
                	echo "<option value='$category_id'>$category_name</option>";
                };
                
 

 				?>
 				<!--   
 				include('conn.php');
           $select_query="Select * from categories";
           $result_query=mysqli_query($con, $select_query);
           while($row=mysqli_fetch_assoc($result_query)){
             $cat_name=$row['name'];
             $cat_id=$row['id'];
             echo "<option value='$cat_id'>$cat_name</option>";
           }

 				?> -->
 				
 				
 			</select>
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto ">
 			<label for="image" class="form-label">Image</label>
 			<div class="d-flex">
 			<input type="file" name="image" id="image" class="form-control shadow-none" accept=".jpeg, .png, .jpg" >
 			<img src="upload/<?php echo $image ?>" class="cart_img">	
 			</div>	
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="author" class="form-label">Author</label>
 			<input type="text" name="author" id="author"  value="<?php echo $author ?>" class="form-control shadow-none" placeholder="Enter the Author" autocomplete="off" >
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="publisher" class="form-label">Publisher</label>
 			<input type="text" name="publisher" id="publisher" value="<?php echo $publisher ?>" class="form-control shadow-none" placeholder="Enter the Publisher" autocomplete="off" >
 		</div><br>


 		<div class="form-outline mb4 w-50 m-auto">
 			<label for="price" class="form-label">Price</label>
 			<input type="number" name="price" id="price"  value="<?php echo $price ?>" class="form-control shadow-none" placeholder="Enter the Price" autocomplete="off" >
 		</div><br>

 		<div class="form-outline mb4 w-50 m-auto">
 			<input type="submit" name="edit_product" class="button1" value="Update product">
 		</div><br>

 	</form>
 </div>
</body>

<!--editing products-->
  <?php 

  if(isset($_POST['edit_product'])){

  	$title=$_POST['title'];
	$description=$_POST['description'];
	$keyword=$_POST['keyword'];
	$category=$_POST['categories'];
	$image=$_FILES['image'] ['name'];
	$temp_image=$_FILES['image'] ['tmp_name'];
	$photo="upload/".$image;
	$author=$_POST['author'];
	$publisher=$_POST['publisher'];
	$price=$_POST['price'];

	//checking if field is empty or not

	// if($title=='' or $description=='' or $keyword=='' or $category=='' or $image=='' or $author=='' or $publisher=='' or $price=='')
	// {
	// 	 echo"<script>alert('Please fill all the fields!')</script>";
	// }else {

		move_uploaded_file($temp_image, $photo);

		//query to update products
		$update_products=" UPDATE items SET title='$title',description='$description',keyword='$keyword',category='$category',
		image='$image',author='$author',publisher='$publisher',price='$price' where item_id= $edit_id";

       // $update_products="UPDATE `items` SET `title`='$title',`description`='$description',`keyword`='$keyword',`category`='$category',`image`='$image',`author`='$author',`publisher`='$publisher',`price`='$price' where item_id= $edit_id";

		$result_update=mysqli_query($con ,$update_products);
		if($result_update){
		echo"<script>alert('Product updated successfully.')</script>";	
		echo"<script>window.open('admin_dashboard.php','_self')</script>";
		}
	// }

  }

  ?>