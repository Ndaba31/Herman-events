<?php
 require_once ('connect.php');

  session_start();
  if (isset($_SESSION['ID']) && isset($_SESSION['email']) ) {

    if(!isset($_GET['id'], $_POST['event'])){
        die('ID is not specified');
      }
  
      $id = $_GET['id'];
      $email = $_SESSION['email'];
      $sql = "SELECT events.title, registration.accepted
            FROM events, registration
            WHERE events.id = registration.event_id
            AND events.id = '$id'
            AND registration.user = '$email'
            ";
      $result = mysqli_query($connection, $sql);

      //print_r(mysqli_fetch_assoc($result));
      
      if(!$result){
          die('id not found');
      }

      $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>

<html>
<head>

      <title> My Events|  </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">

    </head>
  <body>
    <form action="add-event.php" method="post">

        <h1>Herman Events</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div style="display: none;">
            <label>ID</label>
            <input readonly type="text" name="id" value=<?php echo $id; ?>>
            <label>user</label>
            <input readonly type="text" name="user" value=<?php echo $email; ?>>
        </div>
        <label>Event</label>
        <input readonly type="text" name="title" value=<?php echo $row['title']; ?>>
        <label>Status</label>
        <?php
            if($row['accepted'] == 1){
                echo "<input readonly type='text' name='status' value='Accepted'>";
            } else if($row['accepted'] == 2){
                echo "<input readonly type='text' name='status' value='Pending'>";
            } else{
                echo "<input readonly type='text' name='status' value='Rejected'>";
            }
        ?>     
        <div class="buttons">
            <button type="submit" style="background-color: red; margin-left: 5px;" name="remove">Remove from my events</button>
            <a href="my-events.php">Back</a>
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
