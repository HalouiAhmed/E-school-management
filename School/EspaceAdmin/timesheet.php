<?php
   //session_start();
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
<?php require 'defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<!-- slect info from table -->
<h3 class=" font-weight-bold text-info text-center shadow  titre" style="margin-top: 50px;"> Espace des emplois du temps </h3>
<div class="col-xl-12 col-lg-12 card shadow mb-4 "style="background-color:white;font-weight: bold; margin-top:100px;">
    <form action="timesheet2.php" role="form" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12" >
                <label for="classe">Choisir une classe </label>
                <select class="custom-select" name="classe" id="">
                    <option selected value="-1">classe</option>
                    <?php
                    //définir la requete
                    $result = $db->query("SELECT * FROM classe ");  
                    // boucle sur les données
                    while ($row =$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nom'] ?></option>        
                    <?php }?>    
                </select>          
            </div>
            <!--<div class="form-group col-md-6">
                <label for="dateD">Date debut</label>
                <input type="date" class="form-control"  name="DateD" required>
            </div>
            <div class="form-group col-md-6">
                <label for="DateF">Date expiration</label>
                <input type="date" class="form-control"  name="dateF" required>
            </div>
        </div>-->
        <button class="btn-danger">GOOOOOO</button>
    </form>
</div>
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
