<?php
 session_start();
// require_once '../../database/dbConfig.php'; 
   $user_check = $_SESSION['mail'];
   
   $ses_sql = mysqli_query($db,"select * from professeur where mail = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $id_Prof=$row['CIN'];
   $_SESSION['id']= $row['CIN'];
   $_SESSION['id_admin']= $row['id_admin'];
   $login_session = $row['nom'].' '.$row['prenom'];
   $_SESSION['image']=$row['image'];
   if(!isset($_SESSION['id'])){
      header("location:login.php");
      die();
   }
?>