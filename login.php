<?php
 //require_once ('connect.php');

  session_start();

?>
<!DOCTYPE html>

<html>
  <head>
       <meta charset= "utf-8">
      <title> LOGIN|  </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">

    </head>
  <body>


<form action="home.php" method="post">
     <h1>LOGIN</h1>
     <?php if (isset($_GET['error'])) { ?>
       <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
       <label> Email</label>
         <input type="text" name ="username" placeholder=" User name">


         <label> Password</label>
           <input type="password" name ="password" placeholder=" Password">
           
  <button type ="submit" name="login">Login</button>
  <a href="signup.php">Go to sign up</a>

</form>




  </body>

</html>
