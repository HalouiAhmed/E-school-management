<?php
// Include the database configuration file
require_once '../database/dbConfig.php';

 $email=$_POST['email'];
 $password=$_POST['password'];


 if (isset($_POST['loginAdmin'])) {
      $sql= "SELECT * FROM admin WHERE email = '$email' AND password = '$password' ";
  
    $result=mysqli_query($sql);
     $count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    echo "Success! $count";
} else {
    echo "Unsuccessful! $count";
}

     }