<?php
include('conn.php');
$sql="select * from categories;";
$result=mysqli_query($con ,$sql);
// $item_id=

?>
<!DOCTYPE html>
<html>
   <head>
   	<title>Fetch Categories From Database</title>
  </head>
   <body>
      <h3 class="text-center text-success">All Categories</h3>
      <table class="table table-bordered mt-5">
         <thead class="bg-info">
            <tr align="text-center" border="2px">
         <th>Category Id</th>
         <th>Categor name</th>
         
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
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            
            <td><a href="admin_dashboard.php?edit_category=<?php echo $row['id']?> " class="text-light"><i class="fa-solid fa-pen-to-square"></a></td>
            <td><a href="admin_dashboard.php?delete_category=<?php echo $row['id']?> " class="text-light"><i class="fa-solid fa-trash"></a></td>
            
            
            </tr>
        <?php     
        }
        ?> 
      </tbody>
      </table>
   	
     
     	
        
         
         	



     </table>
   </body>
</html>        