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
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
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
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table.  SELECT mc.* FROM 'matclass' as mc 
                                 JOIN 'classe' as c 
                                 on c.id= mc.id_Mat 
                                 ORDER BY c.name -->
                                 <?php $id_Class=$_GET['id_Class']; ?>
                                 <?php $id_Mat=$_GET['id_Mat']; ?>
                                 <?php $id_prof=$_GET['id_prof']; ?>
   <?php   $result = $db->query(" SELECT * FROM matclass WHERE id_Class='$id_Class' AND id_Mat='$id_Mat' AND id_prof='$id_prof'");
   
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
     
      
      <th scope="col">MATIERE</th>
      <th scope="col">COEF</th>
      <th scope="col">PROF</th>
      <th scope="col">MODIFIER</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>

      <?php $id_Mat= $row['id_Mat']?>  
      <?php   $result1 = $db->query("SELECT nom FROM matiere WHERE id='$id_Mat'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td class="">
          <select class="custom-select" name="nomM" id="">
          <option selected value="-1"><?php echo $row1['nom']; ?> </option>
          <?php $result2 = $db->query("SELECT * FROM matiere ");?>
          <?php while ($row2 =$result2->fetch_assoc()) {?>
          <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nom']; ?>
          </option><?php } ?>
          </select>
      </td><?php } ?>



       
      <td class="">
          <?php $id_Mat= $row['id_Mat']?>
          <?php $result2 = $db->query("SELECT coef FROM matiere WHERE id='$id_Mat' ");?>
          <?php while ($row2 =$result2->fetch_assoc()) {?>
          <input name="coef" value="<?php echo $row2['coef']; ?>">
       <?php } ?>
          
      </td>

      <?php $id_prof= $row['id_prof']?>  
      <?php   $result1 = $db->query("SELECT nom,prenom FROM professeur WHERE CIN='$id_prof'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td class="">
        <select class="custom-select" name="nomP" id="">
        <option selected value="-1"><?php echo $row1['nom']."   " . $row1['prenom']; ?> </option>
        <?php $result2 = $db->query("SELECT * FROM professeur ");?>
        <?php while ($row2 =$result2->fetch_assoc()) {?>
        <option value="<?php echo $row2['CIN']; ?>"><?php echo $row2['nom']."   " . $row2['prenom']; ?>
        </option><?php } ?>
        </select>
        </td><?php } ?>
      
     
      <td class="bg-success"><a  style="color:white;"  href="uploadCl.php?id_Mat=<?php echo ($row['id_Mat']); ?>&id_Class=<?php echo ($row['id_Class']); ?>&id_prof=<?php echo ($row['id_prof']); ?>&amp;choix=modifiercl" >modifier</a></td>
      
      <?php $i++; ?>
      <?php } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php } ?>
</div>
</div>











 





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
