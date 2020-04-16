<?php ob_start(); ?>
    <form method="post" action="?action=upload" enctype="multipart/form-data">
      <div class="form-group files">
        <label>Upload Your File </label>
        <input type="file" name="monfichier" class="form-control" multiple="">
      </div>
      <input type="submit" value="Envoyer le fichier" />
    </form>
    <div>
      <p><?php
      if(isset($result)){
        echo($result["status"]);
        echo("<img src=".$result["Url"].">");
      };
      ?></p>

    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
