<?php
include('session.php');
require_once '../database/dbConfig.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Nouveau MP</title>
    </head>
    <body>
    	

<div class="content">
	<h1>Nouveau message priv&eacute;</h1>
	<?php $id=$_GET['id']; ?>

	<?php   $result1 = $db->query("SELECT * FROM admin WHERE id='$id' ");
               if($result1->num_rows > 0){?>
                 <?php while($row1 = $result1->fetch_assoc()){?>
    <form action="uploadMadmin.php?id=<?php echo $row1['id'] ?>" method="post"><?php }} ?>
		Veuillez remplir ce formulaire pour envoyer le MP.<br />
        <label for="title">Titre</label><input type="text" value="" id="title" name="title" /><br />
       
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"></textarea><br />
        <button type="submit" class="btn btn-info" name="envoyer">ENVOYER</button>
    </form>
</div>
  
		<div class="foot"><a href="list_pm.php">Retour &agrave; mes messages priv&eacute;s</a> </div>
	</body>
</html>