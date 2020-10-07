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
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $codeP=$_POST['codeP'];
        $email =$_POST['email'];
        $villeN= $_POST['villeN'];
        $anneeS= $_POST['anneeS'];
        $dateN= $_POST['dateN'];
        $sexe= $_POST['sexe'];
        $tel= $_POST['tel'];
        $classe= $_POST['classe'];
        $CIN=str_replace(' ', '', $_POST['CIN']);
        $id_admin=$_SESSION['id'];
        $mdp=$_POST['mdp'];


          // Get info for parent
        $nomP=$_POST['nomP'];
        $prenomP=$_POST['prenomP'];
        $adresseC=$_POST['adresseP'];
        $telP=$_POST['telP'];
        $emailP =$_POST['emailP'];
        $image = $_FILES['image']['tmp_name'];
        // insert prospect
          if (isset($_POST['inserer'])) {
            
        for ($j = 0; $j <count($nom); $j++)
            {
          
          $imgContent = addslashes(file_get_contents($image[$j]));

         $insert = $db->query("INSERT into etudiant(image,nom,prenom,adresse,codePostal,mail,villeN,anneeS,dateN,sexe,tel,classe,id_admin,mdp) VALUES ('$imgContent','$nom[$j]','$prenom[$j]','$adresse[$j]','$codeP[$j]','$email[$j]','$villeN[$j]','$anneeS[$j]','$dateN[$j]','$sexe[$j]','$tel[$j]','$classe[$j]','$id_admin','$mdp[$j]')");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
                header("Location:gestionEtudiant.php"); 
            }else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            echo $j;
            }
            }


          if(isset($_POST['modifier'])) {
               if(!empty($image)){
               $imgContent = addslashes(file_get_contents($image));}
               else{
                $imgContent=$_SESSION['image'];
                ?>
                <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>
                <?php 
                
               }

          $sql = "UPDATE etudiant SET image='$imgContent', nom='$nom',prenom='$prenom',adresse='$adresse',codePostal='$codeP',mail='$email',villeN='$villeN',anneeS='$anneeS',dateN='$dateN',sexe='$sexe',tel='$tel',classe='$classe'WHERE CIN='$CIN'";
          echo $CIN;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";

            } else {
              echo "Error updating record: " . $db->error;
            }
            
              }




            if($_GET['choix']=='delete'){

                $CIN=$_GET['CIN'];
              // code...
            // delete section
            $sql = "DELETE FROM etudiant WHERE CIN='$CIN'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }

            header('Location:gestionEtudiant.php');
          }





// Display status message
echo $statusMsg;
?>
<a href="view.php">view</a>
