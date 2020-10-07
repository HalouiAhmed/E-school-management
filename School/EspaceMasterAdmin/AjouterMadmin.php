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
  <title>Ajouter Admin</title>
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
<h1 class="m-0 font-weight-bold text-primary " >BIENVENUE DANS L'ESPACE MASTER ADMIN</h1><br>


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
            <!-- Pending Requests Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Classes en totale </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
          <!-- formulaire des etudiant a ajouter  -->
            <div class="col-xl-12 col-lg-12 card shadow mb-4 "style="background-color:white;font-weight: bold;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary ">INFO ADMIN</h2>
              </div>
            </div>
            <!--check box-->
              <div class="form-group col-md-6 mx-auto">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary">Nombre d'admin a créer</span>
              </div>
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck"onclick=" AjouterAdmin()">
                </div>
              </div>
              <input type="number" class="form-control" aria-label="Text input with checkbox"id="nbrEtudiant" value="1">
            </div>
          </div>
            <!--cors du formulaire-->
           <form action="uploadMadmin.php" role="form" method="post" enctype="multipart/form-data">
               <h3 class=" font-weight-bold text-info text-center shadow  titre"> ADMIN NUMERO  : 1</h3>
                <div id="form" class="shadow "style="margin-top:20px;">
            
             
             
          <div class="form-row">
            <div class="form-group col-md-6">
                       <label for="nom">Nom</label>
                       <input type="text" class="form-control" id="nom" name="nomE[]"  required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email[]" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Password</label>
              <input type="text" class="form-control" id="mdp" name="mdp[]" required>
            </div>
            <div class="form-group col-md-6">
              <label for="societe">photo</label>
              <input type="file" class="form-control" id="image" name="image[]" required>
            </div>
            
          </div>
            
            <!--cors du formulaire-->
        <div id="AjoutDeform"></div>
        </div>
       <button type="submit" class="btn btn-primary" name="inserer">submit<button>
</form>
  </body>
  </html>
 
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