<?php

   error_reporting(0);
    require_once '../database/dbConfig.php'; 
   include('session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AjouterEtudiant</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php require 'defaultProf.php';
require_once '../database/dbConfig.php'; 
$id_Prof= $_SESSION['id'];
$id_classe=$_GET['id_class'];
$nom_etudiant=$_GET['?nom_etudiant'];
$prenom_etudiant=$_GET['?prenom_etudiant'];
$id_Mat=$_GET['?id_mat'];
$id_etudiant=$_GET['?id_etudiant'];
$nom_Mat=$_GET['?nom_mat'];

//isertion des notes
?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST") { 
      $description = $_POST['description'];
      $note = $_POST['note'];
      $apreciation = $_POST['apreciation'];
      for ($j = 0; $j <count($note); $j++)
            {
                echo $id_etudiant;
         $insert = $db->query("INSERT into note(description,note,id_etudiant,id_Mat,apreciation) VALUES ('$description[$j]','$note[$j]','$id_etudiant','$id_Mat','$apreciation[$j]')");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            }
         }
         echo $status . $db->error;
      ?>
       <h3 class=" font-weight-bold text-info text-center shadow  titre"> Eleve :<?php echo $nom_etudiant.'   '.$prenom_etudiant;?></h3>
<!--formulaire-->
<form action="" role="form" method="POST" enctype="multipart/form-data">
<div class="card-body">
      <h3 class=" font-weight-bold text-danger  shadow  titre"> Maitere : <?php echo $nom_Mat; ?></h3>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
                <tr>
                    <th scope="col">#</th> 
                    <th scope="col">exam</th> 
                    <th scope="col">note</th> 
                    <th scope="col">appreciation</th>  
                    <th scope="col">supprimer</th>  
                </tr>
            </thead>
            <tbody>
            <?php 
            $result = $db->query("SELECT*FROM note WHERE id_etudiant='$id_etudiant'AND id_Mat='$id_Mat'");
            while ($row =$result->fetch_assoc()) {
            $i=0;
            $i++;
            ?>
            <tr>
                <th class="bg-dark" scope="row"><?php echo $i; ?></th> 
                <td  ><?php echo $row['description']; ?></td>
                <td  ><?php echo $row['note']; ?></td>
                <td  ><?php echo $row['apreciation']; ?></td>
                <td  ><a href="uploadNote.php?id=<?php echo $row['id']; ?>" style="color: red;">X</a></td>
             <?php } ?>
        </tr>
        </tbody>
    </table>
</div>
      </div>
      <!--check box-->
 <div class="form-group col-md-6 mx-auto">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text text-primary">Nombre de note a mettre</span>
        </div>
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck"onclick=" AjouterNote()">
            </div>
        </div>
        <input type="number" class="form-control" aria-label="Text input with checkbox"id="nbrEtudiant" value="1">
    </div>



    <h6 class=" font-weight-bold text-warning text-center shadow  titre"> Note numero   : 1</h6>
    <div id="form" class="shadow "style="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Description</label>
                    <input type="text" class="form-control" id="nom" name="description[]"  required>
                </div>
                <div class="form-group col-md-6">
                    <label for="societe">Note</label>
                    <input type="number" class="form-control" id="prenom" name="note[]" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 mx-auto ">
                    <label for="code">apreciation</label>
                    <input type="text" class="form-control" id="apreciation" name="apreciation[]" required>
                </div>
            </div>
        <div id="AjoutDeform"></div>
    </div>
<button class="btn btn-warning mx-auto" type="submit" name="inserer">enregister les notes<button>
</form>
</div>
<?php 
$delete=$_GET['delete'];
echo $delete;
?>
<!--enregistrer les note-->
<script>

function AjouterNote() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h6 class=" font-weight-bold text-warning text-center shadow  titre">NOTE NUMERO : '+(i+2)+' </h6>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}
</script>
<!-- java Script script-->
<script src="../js/AjouterEtud.js"></script>
<!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>