<?php
 require_once ('connect.php');

  session_start();
  if (isset($_SESSION['ID']) && isset($_SESSION['email']) ) {

?>
<!DOCTYPE html>

<html>
<head>

      <title> Main Page|  </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">

    </head>
  <body>
    <form action="create-event.php" method="post">

        <h1>Create an event</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>Title</label>
        <input type="text" name="title" placeholder="title">
        <label>Description</label>
        <textarea name="description" cols="30" rows="10"></textarea>
        <label>Starting from</label>
        <input type="datetime-local" name="begin">
        <label>Ending on</label>
        <input type="datetime-local" name="end">
        <label>Country</label>
        <input type="text" name="country" placeholder="country">
        <label>City</label>
        <input type="text" name="city" placeholder="city">
        <button type="submit" name="post">Add Event</button>
        <a href="admin.php">Back</a>
    </form>
  </body>

</html>

<?php

}else {
  header("Location: login.php ");
  exit();
}

 ?>
