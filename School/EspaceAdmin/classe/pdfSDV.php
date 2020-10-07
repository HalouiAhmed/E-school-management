<?php 
session_start();
// Include the database configuration file  
require_once '../../database/dbConfig.php'; 
// Get image data from database 

 $id=$_GET['id'];
$result = $db->query("SELECT * FROM tableSD WHERE id=$id  "); 
?>
<?php if($result->num_rows > 0){ ?>
          
        
         <?php while($row = $result->fetch_assoc()){ ?> 
         	<?php //$type= $_FILES[$row['support']]['tmp_name'] ?>
         	
            <object width="100%" height="100%" data="data:video/mp4;base64,<?php echo base64_encode($row['video']) ?>" type="video/mp4"  ></object>
                 <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>