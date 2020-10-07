<?php
   //session_start();
   require_once '../database/dbConfig.php'; 

   include('session.php');
?>
<?php
// Get the incoming image data
$image = $_POST["image"];
$id=$_SESSION['emplois'];
// Remove image/jpeg from left side of image data
// and get the remaining part
$image = explode(";", $image)[1];
 
// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];
 
// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);
// Convert back from base64
$sql = "UPDATE classe SET emplois='$image'WHERE id='$id'";
  if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $db->error;
  }
    

// Convert back from base64
$image = base64_decode($image);
 
// Save the image as filename.jpeg
file_put_contents("filename.jpeg", $image);
 
// Sending response back to client
echo "Done";?>