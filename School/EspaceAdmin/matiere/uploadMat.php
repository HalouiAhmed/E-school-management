<?php
// Include the database configuration file
require_once '../../database/dbConfig.php';

// If file upload form is submitted

$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        if (isset($_POST['inserer']))  {
        $nomC=$_POST['nomC'];
        $nomM=$_POST['nomM'];
        $CIN=$_POST['CIN'];
        echo 'je suis le Cin' . $CIN[1];
         // insert Matiere
      for ($i = 0; $i <count($nomM); $i++)

      {      

             $TableCIN[$i]=$CIN[$i];
             $insert = $db->query("INSERT into matiere(nom) VALUES ('$nomM[$i]')");

             if($insert){
               $db->query($insert);
               printf ("New Matiere has id %d.\n", $id_Matiere=$db->insert_id);
               $id_Matieres[$i] =$id_Matiere;
               

                     $status = 'success';
                     $statusMsg = "Mat upload successfully.";
                 }else{
                     $statusMsg = "File upload failed, please try again." . $db->error;
                 }

      }
                echo $TableCIN[1].  'ECHOOOOOO';
            // insert Classe
            for ($j = 0; $j <count($nomC); $j++)
    {
          $insert = $db->query("INSERT into classe(nom) VALUES ('$nomC[$j]')");
          if($insert){
          $db->query($insert);

          printf ("New Classe has id %d.\n", $id_Classe=$db->insert_id);
                $status = 'success';
                $statusMsg = "Classe upload successfully.";
            }else{
                $statusMsg = "File upload failed, please try again." . $db->error;
            }                
         
          // insert MToisieme table
    for ($t = 0; $t <count($id_Matieres); $t++)
    {   
            $insert = $db->query("INSERT into matclass(id_Mat,id_Class,id_prof) VALUES ('$id_Matieres[$t]','$id_Classe','$TableCIN[$t]')");
            if($insert){
              $db->query($insert);
                    $status = 'success';
                    $statusMsg = "bien wldi upload successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again." . $db->error;
                }

                echo $TableCIN[$t] .'fffffffffffffffff';
 } }




            }

 
           

           if(isset($_POST['modifier'])) {
               $id=$_GET['id'];
          $sql = "UPDATE matiere SET nom='$nom' WHERE id='$id'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
              }



             if($_GET['choix']=='delete') {
                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM matiere WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
          } 
         
        
          








// Display status message
echo $statusMsg;
?>
<a href="view.php">view</a>
