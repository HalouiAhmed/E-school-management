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

  <title>AjouterEtudiant</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css?<?php echo time(); ?>"rel="stylesheet">

</head>
<body>

    <!-- Le code par defaut -->
<?php require '../defaultAdmin.php';?>
<!-- debut de profile  -->
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>








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
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table.  SELECT mc.* FROM 'matclass' as mc 
                                 JOIN 'classe' as c 
                                 on c.id= mc.id_Mat 
                               ORDER BY c.name -->
 <?php $CIN=$_GET['id_prof']; ?>
 <?php   $result1 = $db->query("SELECT * FROM professeur WHERE CIN='$CIN'");?>
 <?php while($row1 = $result1->fetch_assoc()){?> 
<form action="infoMatieresProf.php?CIN=<?php echo ($row1['CIN']); ?>"  role="form" method="post" enctype="multipart/form-data">  <?php
               }
               ?>    
              <label for="classe">Classe</label>
              <select class="custom-select" name="nomC" id="">
                <option selected value="-1">Choisir...</option>
                <?php
              //définir la requete
               $result = $db->query("SELECT * FROM classe  ");?>
               
               // boucle sur les données
               <?php while ($row =$result->fetch_assoc()) {
               ?>
               <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?>
                   
               </option>
                
                <?php
               }
               ?>
              </select>


                      
                 <button   class="btn btn-primary" type="submit" name="voir" value="voir">
                                </form>














 





                      <script type="text/javascript">
                      function switche (){
                          document.getElementById("info").style.display = "none";
                          document.getElementById("update").style.display = "block";

                        }
                      </script>


        <!-- java Script script-->
         <script src="../js/AjouterEtud.js?2"></script>
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
