<?php
include_once 'conn.php';
$sql="select * from items;";
$result=mysqli_query($con ,$sql);
// $item_id=

?>
<!DOCTYPE html>
<html>
   <head>
   	<title>Fetch Items From Database</title>
  </head>
   <body>
      <h3 class="text-center text-success">All Products</h3>
      <table class="table table-bordered mt-5">
         <thead class="bg-info">
            <tr align="text-center" border="2px">
         <th>Item Id</th>
         <th>Title</th>
         <th>Image</th>
         <th>Price</th>
         <th>Status</th>
         <th>Total sold</th>
         
         <th>Edit</th>
         <th>Delete</th>
        </tr>
         </thead>

      <tbody class="bg-secondary text-light">
         <?php
           while($row=mysqli_fetch_assoc($result))
      {
         ?> 
          <tr class="text-center">
            <td><?php echo $row['item_id']?></td>
            <td><?php echo $row['title']?></td>
            <td> <img src="upload/<?php echo $row['image'] ?>" class="cart_img" /></td>
            <td><?php echo $row['price']?>/-</td>
            <td><?php echo $row['status']?></td>
            <td>0</td>
            <td><a href="admin_dashboard.php?edit_product=<?php echo $row['item_id']?> " class="text-light"><i class="fa-solid fa-pen-to-square"></a></td>
            <td><a href="admin_dashboard.php?delete_product=<?php echo $row['item_id']?> " class="text-light"><i class="fa-solid fa-trash"></a></td>
            
            
            </tr>
        <?php     
        }
        ?> 
      </tbody>
      </table>
   	
     
     	
        
         
         	



     </table>
   </body>
</html>        