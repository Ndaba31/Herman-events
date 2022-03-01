<?php

  session_start();
include "connect.php";

function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($username)) {
        header("Location: login.php?error= Username Required to Proceed");
        exit();
    }elseif (empty($pass)) {
      header("Location: login.php?error= Password Required to Proceed");
      exit();
    }else {
    $sql ="SELECT * FROM user WHERE email='$username' AND password='$pass'";
    $result =mysqli_query($connection,$sql );

      if (mysqli_num_rows($result)===1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email']=== $username && $row['password']=== $pass) {
          $_SESSION ['email']= $row ['email'];
          $_SESSION ['name']= $row ['name'];
          $_SESSION ['ID']= $row ['ID'];

          if($row['user_type'] == 'general user'){
            header("Location: mainpage.php");
            exit();
          } else{
            header("Location: admin.php");
            exit();
          }
          
          //echo "Logged in";
        }else {
          header("Location: login.php?error= Username or Password is Incorrect ");
          exit();
        }
        }else {
          header("Location: login.php?error= Username or Password is Incorrect");
          exit();
        }


      }


    } else {
    header("Location: login.php");
      exit();
    }

}

if(isset($_POST['signup'])){
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['firstname'])){
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $pass2 = validate($_POST['password2']);
    $firstname = validate($_POST['firstname']);
    $user_type = $_POST['user_type'];

    if (empty($username)) {
        header("Location: signup.php?error= Email Required to Proceed");
        exit();
    }elseif (empty($pass)) {
      header("Location: signup.php?error= Password Required to Proceed");
      exit();
    } elseif (empty($pass2) || $pass != $pass2) {
      header("Location: signup.php?error= Passwords do not match");
      exit();
    } elseif (empty($firstname)) {
      header("Location: signup.php?error= First Name Required to Proceed");
      exit();
    } else {
        $sql ="INSERT INTO user (name, surname, password, email, user_type) VALUES ('$firstname', '$surname', '$pass', '$username', '$user_type')";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
          header("Location: signup.php?error= " . mysqli_error($connection));
          exit();
        } else {
            header("Location: login.php?error= Account has been set up, login to continue");
            exit();
        }
      }


  } else {
    header("Location: signup.php");
      exit();
  }
}

if(isset($_POST['account'])){
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['firstname'])){
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $pass2 = validate($_POST['password2']);
    $firstname = validate($_POST['firstname']);
    $surname = validate($_POST['surname']);
    $id = $_POST['id'];

    if (empty($username)) {
        header("Location: admin-settings.php?error= Email Required to Proceed");
        exit();
    }elseif (empty($pass)) {
      header("Location: admin-settings.php?error= Password Required to Proceed");
      exit();
    } elseif (empty($pass2) || $pass != $pass2) {
      header("Location: admin-settings.php?error= Passwords do not match");
      exit();
    } elseif (empty($firstname)) {
      header("Location: admin-settings.php?error= First Name Required to Proceed");
      exit();
    } else {
        $sql ="UPDATE `user` 
        SET name = '$firstname', 
          `surname` = '$surname', 
            `password` = '$pass', 
              `email` = '$username'
                  WHERE id = $id";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
          header("Location: admin-settings.php?error= " . mysqli_error($connection));
          exit();
        } else {
            echo "<h1>Account settings updated!</h1>";
            header("refresh:2, url=admin.php");
            exit();
        }
      }


  } else {
    header("Location: admin.php");
      exit();
  }
}