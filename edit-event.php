<?php
 require_once ('connect.php');

  session_start();
  if (isset($_SESSION['ID']) && isset($_SESSION['email']) ) {

    if(!isset($_GET['id'], $_POST['event'])){
        die('ID is not specified');
      }
  
      $id = $_GET['id'];
      $sql = "SELECT * FROM events WHERE id = $id";
      $result = mysqli_query($connection, $sql);
      
      if(mysqli_num_rows($result) != 1){
          die('id not found');
      }

      $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>

<html>
<head>

      <title> Main Page|  </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">

    </head>
  <body>
    <form action="create-event.php" method="post">

        <h1>Edit event</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>ID</label>
        <input readonly type="text" name="id" value=<?php echo $row['id']; ?>>    
        <label>Title</label>
        <input type="text" name="title" value=<?= $row['title']; ?>>
        <label>Description</label>
        <textarea name="description" cols="30" rows="10"><?php echo $row['description']; ?></textarea>
        <label>Starting from</label>
        <input type="datetime-local" name="begin" value=<?php echo $row['begin']; ?>>
        <label>Ending on</label>
        <input type="datetime-local" name="end" value=<?php echo $row['end']; ?>>
        <label>Country</label>
        <input type="text" name="country" value=<?php echo $row['country']; ?>>
        <label>City</label>
        <input type="text" name="city" value=<?php echo $row['city']; ?>>
        <div class="buttons">
            <button type="submit" name="edit" style="background-color: navy;">Confirm</button>
            <button type="submit" style="background-color: red;" name="remove">Delete</button>
            <a href="admin.php">Back</a>
        </div>
    </form>
  </body>

</html>

<?php

}else {
  header("Location: login.php ");
  exit();
}

 ?>
