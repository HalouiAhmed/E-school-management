<?php
  
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
//aficher les classe
$id_Prof= $_SESSION['id'];
$result = $db->query("SELECT DISTINCT classe.nom,classe.id FROM classe INNER JOIN matclass ON classe.id = matclass.id_Class WHERE matclass.id_prof='$id_Prof'");  
echo $db->error;
   while ($row =$result->fetch_assoc()) {
       $id_Class= $row['id']; 
       $nom_Class=$row['nom'];
        ?>
    <h1 class="font-weight-bold text-info  shadow  titre"><?php echo $nom_Class;?></h1>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead  class="table table-hover table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <!-- pour les maitere  -->
                    <?php
                    $result2 = $db->query("SELECT DISTINCT matiere.nom,matiere.id FROM matiere INNER JOIN matclass ON matiere.id = matclass.id_Mat WHERE matclass.id_prof='$id_Prof'AND matclass.id_Class='$id_Class'");  
                    echo $db->error;
                    while ($row2 =$result2->fetch_assoc()) {?>
                    <th scope="col"><?php echo $row2['nom']; ?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>        
                    <?php
                    //les etudiant 
                    $result1 = $db->query("SELECT * FROM etudiant WHERE classe='$id_Class'");
                    while ($row1 =$result1->fetch_assoc()) {
                        $i=1;
                        $nomEtudiant=$row1['nom'];
                        $prenom€tudiant=$row1['prenom'];
                        ?>
                        <tr>
                            <th class="bg-dark" scope="row"><?php echo $i; ?></th>
                            <td class=""><?php echo $row1['nom']; ?></td>
                            <td class=""><?php echo $row1['prenom']; ?></td>
                            
                            <!-- pour les notes des matiere  maitere  -->
                            <?php  $result3 = $db->query("SELECT DISTINCT matiere.nom,matiere.id FROM matiere INNER JOIN matclass ON matiere.id = matclass.id_Mat WHERE matclass.id_prof='$id_Prof'AND matclass.id_Class='$id_Class'");  
                            echo $db->error;
                            while ($row3 =$result3->fetch_assoc()) {
                            ?>
                             <td class=""><a  href="note2.php?id_class=<?php echo ($row['id']); ?>&amp;?id_etudiant=<?php echo ($row1['CIN']); ?>&amp;?nom_etudiant=<?php echo ($row1['nom']); ?>&amp;?prenom_etudiant=<?php echo ($row1['prenom']); ?>&amp;?id_mat=<?php echo ($row3['id']); ?>&amp;?nom_mat=<?php echo ($row3['nom']); ?>">note</a></td>
                            <?php } ?>
                        </tr>
                            <?php } ?>      
                </tbody>
            </table>
        </div>
    </div>
   
      <?php }?>




<!-- java Script script-->
<script src="js/AjouterEtud.js?2"></script>
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
