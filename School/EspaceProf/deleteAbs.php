<?php
// Include the database configuration file
 require_once '../database/dbConfig.php'; 
   include('session.php');
   
$id_Prof= $_SESSION['id'];
$id_Etudiant=$_GET['CIN'];
$id_Mat=$_GET['id_mat'];
  // code...
// delete section
$sql = "DELETE FROM abs WHERE  id_etudiant='$id_Etudiant'AND id_mat='$id_Mat'";

if ($db->query($sql) === TRUE) {
  echo "";
  $url=$_SERVER['HTTP_REFERER'];
  header("location:$url");
} else {
  echo "Error deleting record: " . $db->error;
}






// Display status message
echo $statusMsg;
?>
