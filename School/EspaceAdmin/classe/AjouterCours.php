<?php
   //session_start();
   require_once '../../database/dbConfig.php';
   include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>AjouterCours</title>
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">
</head>
<body>
<?php require '../defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>
<!-- slect info from table -->
<?php   $result = $db->query("SELECT * FROM classe ");
     $nbrClass=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT * FROM matiere ");
     $nbrMat=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrMat++;}
       ?>

<?php   $result = $db->query("SELECT * FROM professeur ");
     $nbrprof=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrprof++;}
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Classes et Matieres</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de Classes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrClass; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Nombre de Matieres</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrMat; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Professeurs inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrprof; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
           
          </div>
          <!-- formulaire des etudiant a ajouter  -->
          
            <div class="col-xl-12 col-lg-12 card shadow mb-4 "style="background-color:white;font-weight: bold;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary ">INFO COURS</h2>
              </div>
            </div>
            <!--check box-->
              <!--<div class="form-group col-md-6 mx-auto">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary">Nombre de cours a créer</span>
              </div>
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck"onclick=" AjouterCours()">
                </div>
              </div>
              <input type="number" class="form-control" aria-label="Text input with checkbox"id="nbrEtudiant" value="1">
            </div>
          </div>-->
            <!--cors du formulaire-->
           <?php $id_Class=$_GET['id_Class']; ?>
           <?php $id_Mat=$_GET['id_Mat']; ?>
           <?php $id_prof=$_GET['id_prof']; ?>
           <?php   $result1 = $db->query("SELECT * FROM matclass WHERE id_Class='$id_Class' AND id_Mat='$id_Mat'  AND id_prof='$id_prof'" );?>
           <?php while($row1 = $result1->fetch_assoc()){?>
           

           <form action="uploadCl.php?id_Class=<?php echo ($row1['id_Class']); ?>&id_Mat=<?php echo ($row1['id_Mat']); ?>&id_prof=<?php echo ($row1['id_prof']); ?>" role="form" method="post" enctype="multipart/form-data"><?php }?>
               <h3 class=" font-weight-bold text-info text-center shadow  titre"> COURS </h3>
                <div id="form" class="shadow "style="margin-top:20px;">
                <div class="form-row">
                 
                      <div class="form-group col-md-6">
                      <label for="societe">Supports</label>
                       <input type="file"  id="file" name="file[]"  multiple="multiple" >
                      </div>
        
                  <div class="form-group col-md-12">
                       <label for="nomCours">Nom</label>
                       <input type="text" class="form-control" id="nom" name="nom"  required>
                  </div>
                  <div class="form-group col-md-12">
                       <label for="societe">Description</label>
                       <textarea rows="4" cols="50" class="form-control" id="description" name="description" ></textarea>
                  </div>
                </div>
            
               </div>
        </div>
        <div id="AjoutDeform"></div>
        </div>
       <button type="submit" class="btn btn-primary" name="insererCours">submit<button>
</form>
  </body>
  </html>
<!-- java Script script-->
 <script src="../js/AjouterEtud.js"></script>
<!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
</body>
</html>