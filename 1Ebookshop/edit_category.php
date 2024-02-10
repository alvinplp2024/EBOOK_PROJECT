<?php 
include('conn.php');
if(isset($_GET['edit_category'])){
  $edit_cat=$_GET['edit_category'];
  $get_cate="Select * from categories where id=$edit_cat";
  $result= mysqli_query($con,$get_cate);
  $row=mysqli_fetch_assoc($result);
  //$id=$row['id'];
  // echo $edit_cat;

  $name=$row['name'];
    
}

if(isset($_POST['edit_cat'])){

    $cat_title=$_POST['cat_name'];
  
    $update_category="UPDATE categories SET name='$cat_title' where id=$edit_cat";

    $result_update=mysqli_query($con, $update_category);
    if($result_update){
    echo"<script>alert('Category updated successfully.')</script>";  
    echo"<script>window.open('admin_dashboard.php?view_categories','_self')</script>";
    }
    else{
      echo"<script>alert('Unable to update.')</script>";
    }

  }

?>


<h2 class="text-center">Update categories</h2>
<h5 class="text-center">Category title</h5>
<form action="" method="post" class="mb-2">
	<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span>
  <input type="text" class="form-control" name="cat_name" value="<?php echo $name; ?>" placeholder="Update category" aria-describedby="basic-addon1">
</div>

<div class="input-group  w-10 mb-2">
  
  <input type="submit" class="btn btn-success px3 mb-3" name="edit_cat" value="Update category">
  <!-- <button class="button1" name="edit_cat">Update category</button> -->
</div>

</form>

<?php 

  
?>