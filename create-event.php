<?php

//session_start();
include "connect.php";

function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['post'])){
  if(isset($_POST['title'], $_POST['description'], $_POST['begin'], $_POST['end'], $_POST['country'], $_POST['city'])){
    $title = validate($_POST['title']);
    $country = validate($_POST['country']);
    $city = validate($_POST['city']);
    $description = $_POST['description'];
    $begin = $_POST['begin'];
    $end = $_POST['end'];

    if (empty($title)) {
        header("Location: post-event.php?error= Title of event is required");
        exit();
    }elseif (empty($country)) {
      header("Location: post-event.php?error= Country Required to Proceed");
      exit();
    } elseif (empty($city)) {
      header("Location: post-event.php?error= City Required to proceed");
      exit();
    } elseif (empty($begin) || empty($end)) {
      header("Location: post-event.php?error= Time of event Required to Proceed");
      exit();
    } else {
        $sql ="INSERT INTO events (title, description, begin, country, city, end) VALUES ('$title', '$description', '$begin', '$country', '$city', '$end')";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
          header("Location: post-event.php?error= " . mysqli_error($connection));
          exit();
        } else {
            header("Location: admin.php?");
            exit();
        }
      }
  } 
}

if(isset($_POST['edit'])){
  if(isset($_POST['title'], $_POST['description'], $_POST['begin'], $_POST['end'], $_POST['country'], $_POST['city'])){
    $title = validate($_POST['title']);
    $country = validate($_POST['country']);
    $city = validate($_POST['city']);
    $description = $_POST['description'];
    $begin = $_POST['begin'];
    $end = $_POST['end'];
    $id = $_POST['id'];

    if (empty($title)) {
        header("Location: edit-event.php?error=Title of event is required");
        exit();
    }elseif (empty($country)) {
      header("Location: edit-event.php?error=Country Required to Proceed");
      exit();
    } elseif (empty($city)) {
      header("Location: edit-event.php?error=City Required to proceed");
      exit();
    } elseif (empty($begin) || empty($end)) {
      header("Location: edit-event.php?error=Time of event Required to Proceed");
      exit();
    } elseif (empty($id)){
      header("Location: edit-event.php?error=Error in getting ID");
      exit;
    } else {
        $sql ="UPDATE `events` 
                SET title = '$title', 
                  `description` = '$description', 
                    `begin` = '$begin', 
                      `country` = '$country', 
                        `city` = '$city', 
                          `end` = '$end' 
                            WHERE id = $id";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
          header("Location: edit-event.php?error=" . mysqli_error($connection));
          exit();
        } else {
            header("Location: admin.php");
            exit();
        }
      }
  } 
}

if(isset($_POST['remove'])){
  $id = $_POST['id'];
  $sql = "DELETE FROM events WHERE id = '$id'";
  $result = mysqli_query($connection, $sql);

  if (!$result) {
    header("Location: edit-event.php?error=" . mysqli_error($connection));
    exit();
  } else {
      header("Location: admin.php");
      exit();
  }
}
?>