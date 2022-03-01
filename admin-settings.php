<?php
  require_once ('connect.php');

  session_start();
  if (isset($_SESSION['ID']) && isset($_SESSION['email']) ) {

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    
    if(!$result){
        die('user not found');
    }

    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>

<html>
  <head>
       <meta charset= "utf-8">
      <title> Admin Page|  </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">

    </head>
  <body>


<form action="home.php" method="post">
     <h1>Account Settings</h1>
     <?php if (isset($_GET['error'])) { ?>
       <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label> ID </label>
    <input readonly type="text" name="id" value=<?php echo $row['ID']; ?>>
    <label> Name</label>
      <input type="text" name ="firstname" value=<?php echo $row['name']; ?>>
      <label> Surname</label>
        <input type="text" name ="surname" value=<?php echo $row['surname']; ?>>
         <label>  Enter Email</label>
          <input type="email" name ="username" value=<?php echo $row['email']; ?>>
           <label> Password</label>
            <input type="password" name ="password" placeholder=" Password">
             <label> Confirm Password</label>
              <input type="password" name ="password2" placeholder=" Confirm Password">

  <button type ="submit" name="account" style="background-color: navy;">Confirm</button>
  <a href="admin.php">Back</a>

</form>




  </body>

</html>
<?php 
  } else {
    header("Location: login.php ");
    exit();
  }
?>