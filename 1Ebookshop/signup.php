<?php
//error_reporting(0);
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="siglog.css" />
  </head>
  <body class="bdy3">
    <div class="signup-box">
      <h1 class="text-center">Sign up</h1>
      <form action="signup_db.php" method="post">

        <label for="username">Username</label>
        <input type="text" id="username" placeholder="" name="username" required />

        

        <label for="address"> Address</label>
        <input type="text" id="address" name="address" required>

        <label for="phone"> Phone Number</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]}{3}-[0-9]{2}-[0-9]{3}" required>

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="" name="email" required/>

        <label for="password">Password</label>
        <input type="password" id="password" placeholder=""  name="password" required/>

        <label for="cpassword">Confirm Password</label>
        <input type="password" id="cpassword" placeholder="" name="cpassword" required/>
        <br>
        
        
        <input type="submit" value="Sign up" name="signup" />
      

          
    <p class="para-2">
      <b>Already have an account? <a href="login.php" style="color:mediumvioletred;">Login here</a></b>
    </p>
    </form>
    </div>
  </body>
</html>





