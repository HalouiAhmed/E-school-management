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
<!-- debut de profile  -->
<!-- Appel de la base de dennée -->
<?php require_once '../database/dbConfig.php'; ?>
  <div id="info">
<!-- slect info from table -->
<?php $id=$_GET['id']; ?>
<?php   $result = $db->query("SELECT * FROM admin WHERE id='$id' ");

 if($result->num_rows > 0){?>
   <?php while($row = $result->fetch_assoc()){?>
<div class="container emp-profile">
            <form >
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img ">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2 class=" font-weight-bold text-info  shadow  titre">
                                        <?php echo $row['nomE']; ?>
                                    </h2>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">information admin</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <a  onclick="switche()" href="#"  class="btn btn-primary " >modifier profil </a>
                       
                      <br>
              
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                        <div class="profile-work">
                            <p></p>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            
                        </div>
                    </div>
                    <div class="col-md-8 shadow">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['mail']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>mot de passe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['mdp']; ?></p>
                                            </div>
                                        </div>
                                        
                                       
                            </div>
                           
                                </div>
                            </div>
                        </div>
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

              <?php   $result = $db->query("SELECT * FROM admin WHERE id='$id' ");
               if($result->num_rows > 0){?>
                 <?php while($row = $result->fetch_assoc()){?>
              <div class="container emp-profile">
                        <form action="uploadMadmin.php?id=<?php echo $row['id'] ?>"  role="form" method="post" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="profile-img ">
                                          <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt=""/>
                                           <?php $_SESSION['image']=$row['image'];?>
                                          <div class="file btn btn-lg btn-primary">
                                              <button class="btn btn-primary" >Changer image
                                              
                                              <input type="file"  accept="image/*" name="image" id="image"  onchange="loadFile(event)" >
                                            </button>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="profile-head">
                                                  <h2 class=" font-weight-bold text-info  shadow  titre">
                                                    <input class="form-control" name="nomE" value="<?php echo $row['nomE']?> ">
                                                     
                                                  </h2>
                                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                                              <li class="nav-item">
                                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">iformation professeur</a>
                                              </li>
                                              
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-2">

                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                      <div class="profile-work">
                                          <p></p>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a>
                                          <p></p>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                      </div>
                                  </div>
                                  <div class="col-md-8 shadow">
                                      <div class="tab-content profile-tab" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                      
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label >Email</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="email" name="email" value=" <?php echo $row['mail']; ?> "></p>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label >mot de passe</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="text" name="mdp" value=" <?php echo $row['mdp']; ?> "></p>
                                                          </div>
                                                      </div>
                                                      
                                                     
                                                      
                                                      
                                          </div>
                                          
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

                        }</script> 


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