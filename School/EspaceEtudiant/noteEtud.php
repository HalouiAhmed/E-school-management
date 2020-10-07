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
$id_Class=$_SESSION['id_class'];
$id_Mat=$_GET['id_mat'];
echo $id_Etudiant;
$nom_Mat=$_GET['nom_mat'];

//isertion des notes
?>
       <h3 class=" font-weight-bold text-info text-center shadow  titre"> Eleve :<?php echo $login_session;?></h3>
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
                </tr>
            </thead>
            <tbody>
            <?php 
            $result = $db->query("SELECT*FROM note WHERE id_etudiant='$id_Etudiant'AND id_Mat='$id_Mat'");
            echo $db->error;
            while ($row =$result->fetch_assoc()) {
            $i=0;
            $i++;
            ?>
            <tr>
                <th class="bg-dark" scope="row"><?php echo $i; ?></th> 
                <td  ><?php echo $row['description']; ?></td>
                <td  ><?php echo $row['note']; ?></td>
                <td  ><?php echo $row['apreciation']; ?></td>
             <?php } ?>
        </tr>
        </tbody>
    </table>
</div>
      </div>


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
