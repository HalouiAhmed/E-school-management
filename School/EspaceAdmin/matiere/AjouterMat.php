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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
<?php require '../defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<<?php require_once '../../database/dbConfig.php'; ?>
<!-- slect info from table -->
<?php   $result = $db->query("SELECT * FROM etudiant ");
     $nbrEtudiant=0;
     $nbrFille=0;
     $nbrGarcon=0; ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrEtudiant++;
      if ($row['sexe']=='fille') {
        $nbrFille++;
        // code...
      }
      if ($row['sexe']=='garcon') {
        $nbrGarcon++;
        // code...
      }
    }
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des etudiants</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Eleve inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Filles inscrites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Garcon Inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
          </div>
          <!-- formulaire des etudiant a ajouter  -->
            <div class="col-xl-12 col-lg-12 card shadow mb-4 "style="background-color:white;font-weight: bold;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary ">INFO MATIERE</h2>
              </div>
            </div>
            <!--check box-->
              <div class="form-group col-md-6 mx-auto">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary">Nombre de niveau a crerer</span>
              </div>
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck"onclick="AjouterMat()">
                </div>
              </div>
              <input type="number" class="form-control" aria-label="Text input with checkbox"id="nbrEtudiant" value="1">
            </div>
          </div>
            <!--cors du formulaire-->
           <form action="uploadMat.php" role="form" method="post" enctype="multipart/form-data">
               <h3 class=" font-weight-bold text-info text-center shadow  titre"> Ajouter des classes  </h3>
                <div id="form" class="shadow "style="margin-top:20px;">
               <!--pour les classes-->
                <div class="form-row">
                   <div class="form-group col-md-6" id="ajoutC">
    			             <label for="nom">Nom De la classe </label>
      			            <input type="text" class="form-control"  name="nomC[]" required  >
                   </div>
                   <div class="form-group col-md-6" id="ajoutC1"></div>
                   <a href="#ajouC1" class="btn btn-primary" onclick="AjouterC()">Ajouter Classe</a>
              </div>
              <h3 class=" font-weight-bold text-info text-center shadow  titre"> Ajouter des Matiere/prof pour les classes selectionné </h3>
              <div class="form-row " id="ajoutM">
                 <!--pour les matierez-->
                  <div class="form-group col-md-6" >
    			             <label for="nom">Nom De la MATIERE </label>
      			            <input type="text" class="form-control"  name="nomM[]"  required>
                   </div>
              
              <div class="form-group col-md-6" >
              <label for="nom">Nom Du Prof </label>
              <select class="custom-select" name="CIN[]" id="">
                <option selected value="-1">prof</option>
                <?php
              //définir la requete
               $result = $db->query("SELECT * FROM professeur ");?>
               
               // boucle sur les données
               <?php while ($row =$result->fetch_assoc()) {
               ?>
               <option value="<?php echo $row['CIN']; ?>"><?php echo $row['nom'].'   ' .$row['prenom']; ?>
                   
               </option>
                
                <?php
               }
               ?>
              </select>

               
            </div>
             </div>
             <div class="form-row" id="ajoutM1"></div>
            <a href="#ajouM1" class="btn btn-primary" onclick="AjouterM()">Ajouter De la matiere</a>
      </div>
                   

    	        </div>
    	       
          
        </div>
        <div id="AjoutDeform"></div>
       <button type="submit" name="inserer">submit<button>
</form>
  </body>
  </html>
  <script>
    function AjouterC() {
  var classe=document.getElementById("ajoutC").innerHTML;
  document.getElementById("ajoutC1").innerHTML+=classe;
}
function AjouterM() {
  var classe=document.getElementById("ajoutM").innerHTML;
  document.getElementById("ajoutM1").innerHTML+=classe;
}

  </script>
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
