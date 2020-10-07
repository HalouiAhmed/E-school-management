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
  <div id="info">
<!-- slect info from table -->
<?php $id=$_GET['id']; ?>
<?php   $result = $db->query("SELECT * FROM matiere WHERE id='$id' ");
 if($result->num_rows > 0){?>
   <?php while($row = $result->fetch_assoc()){?>
<div class="container emp-profile">
            <form >
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2 class=" font-weight-bold text-info  shadow  titre">
                                        <?php echo $row['nom']; ?>
                                    </h2>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                      <a  onclick="switche()" href="#"  class="btn btn-primary " >edite pofeile </a>


                    </div>
                </div>
                
            </form>
        </div>
          <?php } ?>
            <?php } ?>
        </div>
            <div id="update">
              <!-- Appel de la base de dennée -->
              <!-- slect info from table -->

              <?php   $result = $db->query("SELECT * FROM matiere WHERE id='$id' ");
               if($result->num_rows > 0){?>
                 <?php while($row = $result->fetch_assoc()){?>
              <div class="container emp-profile">
                        <form action="uploadMat.php?id=<?php echo ($row['id']); ?>"  role="form" method="post" enctype="multipart/form-data">
                             
                              <div class="row">
                                <div class="col-md-4">
                                      
                                  </div>
                                  <div class="col-md-8 shadow">
                                      <div class="tab-content profile-tab" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>nom</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>  <input class="form-control" type="text" name="nom" value=" <?php echo $row['nom']; ?> ">  </p>
                                                          </div>
                                                      
                                                      </div>
                                                      
                                                      
                                                      
                                          </div>
                                         

                                  </div>
                                  <button   class="btn btn-primary" type="submit" name="modifier" value="update">
                                </form>
                              </div>
                            <?php } ?>
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
