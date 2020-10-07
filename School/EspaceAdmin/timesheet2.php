
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
<!-- get date -->
<?php
$classe=$_POST['classe'];
$_SESSION['emplois'] = $classe;
//$DateD=$_POST['dateD'];
//$DateF=$_POST['dateF'];
//tables
$Days=array ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche');
$time=array('8-9','9-10','10-11','11-12','14-15','15-16','16-17','17-18')
?>
<div class="card shadow mb-4"  id="emplois" style="margin-top: 50;">
<div class="form-row">
            <div class="form-group col-md-6">
                <label for="dateD">Date debut</label>
                <input type="date" class="form-control"  name="DateD" required>
            </div>
            <div class="form-group col-md-6">
                <label for="DateF">Date expiration</label>
                <input type="date" class="form-control"  name="dateF" required>
            </div>
        </div>

<a href="#" class="btn btn-dark mx-auto" onclick="screenShot()" type="submit" nom="submit">Save</a>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-danger">
                <tr>
                <th scope="col">Temps</th>
                <?php for ($i = 0; $i <count($Days); $i++){?>
                <th scope="col"><?php echo $Days[$i] ?></th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
                <!--Table body -->
                <?php for ($i = 0; $i <count($time); $i++){?>
                <tr>
                    <th class="table-primary" scope="row"><?php echo $time[$i] ?></th>
                    <?php for ($j = 0; $j <count($Days); $j++){?>
                    <td class="bg-light" scope="row">
                         <!--Pour les matiere -->
                        <select class="custom-select" name="" id="" style="color: black; background-color:	#98FB98">
                            <option selected value="-1">Matiere</option>
                            <?php
                            //définir la requete
                            $result = $db->query("SELECT(nom) FROM matiere m INNER JOIN matclass c ON m.id = c.id_Mat WHERE c.id_class='$classe'");  
                            // boucle sur les données
                            while ($row =$result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>        
                            <?php }?>    
                        </select>    
                         <!--Pour les prof -->
                         <select class="custom-select" name="" id="" style="color: black; background-color:	#90EE90">
                            <option selected value="-1">Prof</option>
                            <?php
                            //définir la requete
                            $result = $db->query("SELECT DISTINCT(nom) FROM professeur p INNER JOIN matclass c ON p.CIN = c.id_prof WHERE c.id_class='$classe'");  
                            // boucle sur les données
                            while ($row =$result->fetch_assoc()) {
                            ?>
                            <option value="<?php  $row['nom']; ?>"><?php echo $row['nom'] ;?></option>        
                            <?php }?>    
                        </select>    
                        <input type="text" class="form-control"  value="salle"  required  style="color: black; background-color:#00FA9A">  
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</div>
</div>         
<script>
    function screenShot(){
        window.scrollTo(0, 0);
 
 html2canvas(document.getElementById("emplois")).then(function (canvas) {

     // Create an AJAX object
     var ajax = new XMLHttpRequest();

     // Setting method, server file name, and asynchronous
     ajax.open("POST", "uploadEmploi.php", true);

     // Setting headers for POST method
     ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

     // Sending image data to server
     ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

     // Receiving response from server
     // This function will be called multiple times
     ajax.onreadystatechange = function () {

         // Check when the requested is completed
         if (this.readyState == 4 && this.status == 200) {

             // Displaying response from server
             console.log(this.responseText);
         }
     };
 });
}
</script>
<!-- hatmlcanva2-->
<script src="js/html2canvas.js"></script>
<!-- java Script script-->
<script src="js/AjouterEtud.js"></script>
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
