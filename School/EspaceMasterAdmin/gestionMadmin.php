<?php
   //session_start();
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

  <title>AjouterProf</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
<?php require 'defaultMAdmin.php';?>
<!-- Appel de la base de dennée -->
<?php require_once '../database/dbConfig.php'; ?>
<!-- slect info from table -->
<?php   $result = $db->query("SELECT * FROM admin ");
     $nbrAdmin=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrAdmin++;
      
        // code...
      
    }
       ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Admin</h1>
           
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrAdmin; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table -->
   <?php   $result = $db->query("SELECT * FROM admin ");
     if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">NOM ECOLE</th>
      <th scope="col">PLUS D'INFO</th>
      <th scope="col">CONTACTER</th>
      <th scope="col">SUPPRIMER</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
      <td class=""><?php echo $row['id']; ?></td>
      <td class=""><?php echo  $row['nomE']; ?></td>
       
     
      <td class="bg-info"><a style="color:white;" href="infoMadmin.php?id=<?php echo ($row['id']); ?>&amp;choix=insertion">Plus </a></td>
      <td class="bg-warning"><a style="color:white;" href="new_pm.php?id=<?php echo ($row['id']); ?>&amp;choix=contacter">contacter</a></td>
      <td class="bg-danger"><a   style="color:white;" href="uploadMadmin.php?id=<?php echo ($row['id']); ?>&amp;choix=delete">suprimer</a></td>
      <?php $i++; ?>
      <?php } ?>
    </tr>
  </tbody>
</table>
<div class="foot"><a href="list_pm.php">Voir mes messages priv&eacute;s</a> </div>
</div>
</div>
</div>

<?php } ?>
<!-- Delete sction-->

<script>


</script>

<!-- java Script script-->
 <!-- java Script script--><script src="js/AjouterEtud.js?2"></script>
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
