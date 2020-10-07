<?php 
session_start();
// Include the database configuration file  
require_once '../../database/dbConfig.php'; 
// Get image data from database 
 $id_Devoir=$_GET['id_Devoir'];
 $id_Class=$_GET['id_Class'];
 $id_Mat=$_GET['id_Mat'];
 $id_prof=$_GET['id_prof'];
$result = $db->query("SELECT * FROM devoir WHERE id=$id_Devoir AND id_Mat='$id_Mat' AND id_Class='$id_Class' AND id_prof='$id_prof' "); 
?>
<?php if($result->num_rows > 0){ ?>
          
        
         <?php while($row = $result->fetch_assoc()){ ?> 
         	<?php //$type= $_FILES[$row['support']]['tmp_name'] ?>
            <object width="100%" height="100%" data="data:application/pdf;base64,<?php echo base64_encode($row['support']) ?>" type="application/pdf"  ></object>
                 <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>