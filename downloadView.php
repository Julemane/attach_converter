<?php require_once('upload.php'); ?>

<?php ob_start();

  echo($fileName." ".$result);
  echo("<img src=".$fileLocation."/>");


?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

