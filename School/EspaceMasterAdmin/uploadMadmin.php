<?php
session_start();
// Include the database configuration file
require_once '../database/dbConfig.php';
error_reporting(0);


// If file upload form is submitted
$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        $nomE=$_POST['nomE'];
        $email =$_POST['email'];
        $mdp =$_POST['mdp'];
        $image = $_FILES['image']['tmp_name'];
        // insert prospect
          if (isset($_POST['inserer'])) {

            
        for ($j = 0; $j <count($nomE); $j++)
            {
          
          $imgContent = addslashes(file_get_contents($image[$j]));
          
         $insert = $db->query("INSERT into admin(image,nomE,mail,mdp) VALUES ('$imgContent','$nomE[$j]','$email[$j]','$mdp[$j]')");

        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
                header('Location:gestionMadmin.php');
                ?>
                <div class="foot"><a href="list_pm.php">Retour &agrave; mes messages priv&eacute;s</a><?php 
            }else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            echo $j;
            }

            }


          if(isset($_POST['modifier'])) {
             $id =$_GET['id'];

               if(!empty($image)){
               $imgContent = addslashes(file_get_contents($image));}
               else{
                $imgContent=$_SESSION['image'];
                ?>
                <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>
                <?php 
                
               }

          $sql = "UPDATE admin SET image='$imgContent', nomE='$nomE',mail='$email',mdp='$mdp' WHERE id='$id'";
          
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
             
            } else {
              echo "Error updating record: " . $db->error;
            }
           
              }




            if($_GET['choix']=='delete'){

                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM admin WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionMadmin.php');
          }


          if($_GET['choix']=='contacter'){

            $id=$_GET['id'];
            // code...
            // delete section
            $sql = "DELETE FROM admin WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionMadmin.php');
          }



          if (isset($_POST['envoyer'])) 
{
      
    $title=$_POST['title']; 
    $message=$_POST['message']; 
    $id_eme=$_SESSION['id'];
    $id_dest=$_GET['id']; 
        
        //On envoi le message
    $insert = $db->query("INSERT INTO pm (title,user1,user2,message) VALUES ('$title','$id_eme','$id_dest','$message')");
     if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";?>
                <!--<div class="message">Le message a bien &eacute;t&eacute; envoy&eacute;.<br />
                <a href="list_pm.php">Liste de mes messages priv&eacute;s</a></div>-->
            <?php }
     else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            header('Location:gestionMadmin.php');          

}









echo $statusMsg;
?>
<a href="view.php">view</a>
