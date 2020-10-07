<?php
 session_start();
 require_once '../database/dbConfig.php'; 
   $user_check = $_SESSION['CIN'];
   
   $ses_sql = mysqli_query($db,"select * from etudiant where CIN = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['nom'].' '.$row['prenom'];
   $_SESSION['image']=$row['image'];
   $_SESSION['id_class']=$row['classe'];
   
   
   if(!isset($user_check)){
      header("location:login.php");
      die();
   }
?>