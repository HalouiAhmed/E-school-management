<?php
 session_start();
 //require_once '../database/dbConfig.php'; 
   $user_check = $_SESSION['mail'];
   
   $ses_sql = mysqli_query($db,"select * from admin where mail = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $id_Prof=$row['id'];
   $_SESSION['id']= $row['id'];
   $login_session = $row['nomE'];
   $_SESSION['image']=$row['image'];
   

   
   
   if(!isset($_SESSION['id'])){
      header("location:login.php");
      die();
   }
?>