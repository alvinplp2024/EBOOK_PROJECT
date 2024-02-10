<?php
 include('conn.php');
 if(isset($_POST['bk_cat'])){

  $cat_title=$_POST['book_title'];

  //insert in db
$select_query="Select * from categories where name='$cat_title'";
$result_select= mysqli_query($con,$select_query);
$number= mysqli_num_rows($result_select);
  
  if($number>0){
    echo " <script>alert('This category is already present')</script>";
  } else{
    
  $insert_query="insert into categories (name) values ('$cat_title')";
  $result= mysqli_query($con,$insert_query);
  if($result){
    echo " <script>alert('Category has been inserted successfully')</script>";
    //header("Location:dashboard.php");
  }
 }
 }

?>

<h2 class="text-center">Insert categories</h2>
<form action="" method="post" class="mb-2">
	<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span>
  <input type="text" class="form-control" name="book_title" placeholder="Insert category" aria-describedby="basic-addon1">
</div>

<div class="input-group  w-10 mb-2">
  
  <!--<input type="submit" class="form-control bg-success" name="cat_title" value="Insert item">-->
  <button class="button1" name="bk_cat">Insert category</button>
</div>

</form>