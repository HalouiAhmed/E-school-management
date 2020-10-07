<?php
// Include the database configuration file
require_once '../database/dbConfig.php';
$id=$_GET['id'];
  // code...
// delete section
$sql = "DELETE FROM note WHERE id='$id'";

if ($db->query($sql) === TRUE) {
  echo "Record deleted successfully";
  $url=$_SERVER['HTTP_REFERER'];
  header("location:$url");
} else {
  echo "Error deleting record: " . $db->error;
}






// Display status message
echo $statusMsg;
?>
