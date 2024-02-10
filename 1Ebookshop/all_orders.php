<?php
include('conn.php');
$sql="select * from payment;";
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
         <thead class="bg-primary">
            <tr align="text-center" border="2px">
         
         <th>Order ID</th>
         <th>Invoice Number</th>
         <th>Amount</th>
         <th>Payment Mode</th>
         <th>Date</th>
         <th>Delete</th>
        </tr>
         </thead>

      <tbody class="bg-secondary text-light">
         <?php
           while($row=mysqli_fetch_assoc($result))
      {
         ?> 
          <tr class="text-center">
            
            <td><?php echo $row['order_id']?></td>
            <td><?php echo $row['invoice_number']?></td>
            <td><?php echo $row['amount']?>/-</td>
            <td><?php echo $row['payment_mode']?></td>
            <td><?php echo $row['date']?></td>
            <td><a href="admin_dashboard.php?delete_all_orders=<?php echo $row['order_id']?> " class="text-light"><i class="fa-solid fa-trash"></a></td>
            
            
            </tr>
        <?php     
        }
        ?> 
      </tbody>
      </table>
    
     
      
        
         
          



     </table>
   </body>
</html>        