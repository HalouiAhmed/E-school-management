<?php
   session_start();
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
<?php require 'defaultEtud.php';
$id_Etudiant=$_SESSION['CIN'];
?>

<?php $result2 = $db->query("SELECT DISTINCT matiere.nom,matiere.id FROM matiere INNER JOIN abs ON matiere.id = abs.id_mat WHERE abs.id_etudiant=$id_Etudiant");  
                    echo $db->error;
                    while ($row2 =$result2->fetch_assoc()) {
                        $id_Mat=$row2['id'];
                        ?>
                    <h2><?php echo $row2['nom']; ?></h2>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead  class="table table-hover table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date d'abssnece</th>
                        <th scope="col">nombre d'heure</th>
                        <th scope="col">justifier</th>
                    </tr>
                </thead>
                <tbody>        
                    <?php
                    //les etudiant 
                    $result1 = $db->query("SELECT * FROM abs WHERE id_etudiant='$id_Etudiant'AND id_mat='$id_Mat'");
                    echo $db->error;
                    while ($row1 =$result1->fetch_assoc()) {
                        $i=1;
                        ?>
                        <tr>
                            <th class="table-primary" scope="row"><?php echo $i; ?></th>
                            <td class=""><?php echo $row1['date']; ?></td>
                            <td class=""><?php echo $row1['nbrHeur']; ?></td>
                            <td class=""><?php echo $row1['justif']; ?></td>
                        </tr>

                         <?php } ?>      
                </tbody>
            </table>
            <?php 
            ?>
                    <?php } ?>
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
