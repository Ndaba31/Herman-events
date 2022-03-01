<?php
   $connection = mysqli_connect('sql305.epizy.com','epiz_31186552', 'yHhb0qCcrz');

   if (!$connection){
      die("The Database connection has Failed" . mysqli_error($connection));

   }
   $select_db= mysqli_select_db($connection, 'epiz_31186552_eventss');
   if (!$select_db){
      die ("Selection of Database has failed" . mysqli_error($connection));

      }
?>
