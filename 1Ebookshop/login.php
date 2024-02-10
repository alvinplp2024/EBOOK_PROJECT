<?php 
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="siglog.css" />
    
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>  
      <form action="log_db.php" method="post"> 
        <label>Username</label>
        <input type="text" placeholder="" name="username" required />
        <label>Password</label>
        <input type="password" placeholder="" name="password" required/>
        <!-- <p class="para-2">
         <b><a href="forgot.php" style="color:mediumvioletred;">Forgot password</a></b></p> -->

        <input type="submit" value="Login" name="submit" />
      
    
    <p class="para-2">
      <b>Do not have an account? <a href="signup.php" style="color:mediumvioletred;">Sign Up Here</a></b>


    </p>
    </form>
    </div>
  </body>
</html>