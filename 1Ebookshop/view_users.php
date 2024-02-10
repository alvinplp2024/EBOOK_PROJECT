<?php
include('conn.php');
$sql="select * from customers;";
$result=mysqli_query($con ,$sql);


?>
<!DOCTYPE html>
<html>
   <head>
    <title>Fetch all customers from Database</title>
  </head>
   <body>
      <h3 class="text-center text-success">All Customers</h3>
      <table class="table table-bordered mt-5">
         <thead class="bg-info">
            <tr align="text-center" border="2px">
         <th>Customer Id</th>
         <th>Customer username</th>
         <th>address</th>
         <th>phone number</th>
         <th>email</th>
        </tr>
         </thead>

      <tbody class="bg-secondary text-light">
         <?php
           while($row=mysqli_fetch_assoc($result))
      {
         ?> 
          <tr class="text-center">
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['email']?></td>
            
            
            
            
            </tr>
        <?php     
        }
        ?> 
      </tbody>
      </table>
    
     
        
        
         
            



     </table>
   </body>
</html>        