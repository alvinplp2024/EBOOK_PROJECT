<?php
include_once 'conn.php';
$sql="select * from myorder;";
$result=mysqli_query($con ,$sql);



?>
<!DOCTYPE html>
<html>
   <head>
   	<title>Fetch Orders From Database</title>
  </head>
   <body>
      <h3 class="text-center text-success">My Orders</h3>
      <table class="table table-bordered mt-5">
         <thead class="bg-info">
            <tr align="text-center" border="2px">
         <th>order ID </th>     
         <th>User ID</th>
         <th>shopping fee</th>
         <th>invoice number</th>
         
         <th>order date</th>
         <th>Complete/Incomplete</th>
         <th>order status</th>
         
         
         
        </tr>
         </thead>

      <tbody class="bg-success text-light">
         <?php
           while($row=mysqli_fetch_assoc($result))
      { 
       $order_id=$row['order_id'];
       $order_user_id=$row['user_id'];      
       $order_shopping_fee=$row['shopping_fee'];
       $order_invoice_number=$row['invoice_number'];
       $order_order_date=$row['order_date'];
       $order_status=$row['order_status'];
         
         
             if($order_status=='pending'){
            $order_status='Incomplete';
               // echo 'incomplete';
             }else {
               $order_status='Complete';
             }

         ?> 
          <tr class="text-center">
            <td><?php  echo $order_id?></td>
            <td><?php  echo $order_user_id?></td>
            <td><?php  echo $order_shopping_fee?></td>
            <td><?php  echo $order_invoice_number?></td>
            <td><?php  echo $order_order_date?></td>
            <td><?php  echo $order_status ?></td>

          <?php 
          if($order_status=='Complete'){
            echo "<td>Paid</td>";
          }
          else{          
            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>";
                      
            }
            
            ?>
            </tr> 
        <?php     
        }
        ?> 
      </tbody>
      </table>
   	
     
     	
        
         
         	



     </table>
   </body>
</html>        