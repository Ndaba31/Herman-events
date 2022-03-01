<?php
 require_once ('connect.php');

  session_start();
  if (isset($_SESSION['ID']) && isset($_SESSION['email']) ) {

    $sql = "SELECT * FROM events";
    $res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res);
?>
<!DOCTYPE html>

<html>
<head>

      <title> Herman Events|  </title>
      <link rel="stylesheet" type="text/css" href="general.css">

    </head>
  <body>
    <nav>
        <h1><?= $_SESSION['name'] ?></h1>
        <div>
            <a class="active" href="#">Events</a>
            <a href="my-events.php">My Events</a>
            <a href="user-settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <main>
      <div class="content">
        <?php 
            if ($count == 0) {
                echo "<h1>No Events posted yet</h1>";
              }
              else {
                      for ($i=0; $i < $count; $i++) {
                        $res->data_seek($i);
                        $row = mysqli_fetch_assoc($res);
                        $id = $row['id'];
                        ?>
                            <form action='add-event.php?id=<?= $id ?>&email=<?= $_SESSION['email'] ?>' method='post'>
                                <button class='card' name='event' type='submit'>
                                <h3><?=$row['title']?></h3>
                                <hr>
                                <p><?=$row['description']?></p>
                                <br>
                                <div class='info'>
                                    <p><strong>From</strong></p><p><?=substr($row['begin'], 11)?>, <?=substr($row['begin'], 8, 2)?>/<?=substr($row['begin'], 5, 2)?>/<?=substr($row['begin'], 0, 4)?></p>
                                </div>
                                <div class='info'> 
                                    <p><strong>To</strong></p><p><?=substr($row['end'], 11)?>, <?=substr($row['end'], 8, 2)?>/<?=substr($row['end'], 5, 2)?>/<?=substr($row['end'], 0, 4)?></p>
                                </div> 
                                <div class='info'>  
                                    <p><strong>Location </strong></p><p><?=$row['city']?>, <?=$row['country']?></p>
                                </div>
                                </button>
                            </form>
                        <?php
                    }
              }
        ?>
        </div>
    </main>
  </body>

</html>

<?php
    
}else {
  header("Location: login.php ");
  exit();
}

 ?>
