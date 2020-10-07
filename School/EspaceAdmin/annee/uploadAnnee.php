<?php
session_start();
// Include the database configuration file
require_once '../../database/dbConfig.php';
error_reporting(0);


// If file upload form is submitted
$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        $nom=$_POST['nom'];
       


       
        // insert prospect
          if (isset($_POST['inserer'])) {
            
        for ($j = 0; $j <count($nom); $j++)
            {
          
          

         $insert = $db->query("INSERT into anneeS(nom) VALUES ('$nom[$j]')");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
                header('Location:gestionAnnee.php');

            }else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            echo $j;
            }

            }


          if(isset($_POST['modifier'])) {
              
                $id=$_GET['id'];
             

          $sql = "UPDATE anneeS SET nom='$nom' WHERE id='$id'";
          echo $CIN;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
              header('Location:gestionAnnee.php');

               //header("Location:infoProf.php?CIN=$CIN");
            } else {
              echo "Error updating record: " . $db->error;
            }
           
              }




            if($_GET['choix']=='delete'){

                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM anneeS WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionAnnee.php');
          }





// Display status message
echo $statusMsg;
?>
<a href="view.php">view</a>
