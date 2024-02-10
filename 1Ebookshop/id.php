<?php
include_once 'conn.php';
$sql="select * from customers;";
$result=mysqli_query($con ,$sql);

?>

<!DOCTYPE html>
<html>
   <head>
   	<title>Fetch Data From Database</title>
  </head>
   <body>
   	
     <table align="center" align="text-center" border="3px" style="width:800px; line-height: 50px;">
     	<tr> 
           <th colspan="6"><h2>Customers</h2></th>
           
           
     	</tr>
     	<tr>
     	   <th>Id</th>
     	   <th>First Name</th>
           <th>Last Name</th>
           <th>Address</th>
           <th>Phone</th>
           <th>Email</th>
     	</tr>
     	<?php
     	while($row=mysqli_fetch_assoc($result))
     	{
         ?> 
          <tr>
          	<td><?php echo $row['id']?></td>
          	<td><?php echo $row['fname']?></td>
          	<td><?php echo $row['lname']?></td>
          	<td><?php echo $row['address']?></td>
          	<td><?php echo $row['phone']?></td>
          	<td><?php echo $row['email']?></td>
          
          </tr>	
          <?php
     	}
     	?>
     </table>

   </body>
</html>   