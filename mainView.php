<?php ob_start(); ?>

    <form method="post" action="upload" enctype="multipart/form-data">
      <div class="form-group files">
        <label>Upload Your File </label>
        <input type="file" name="monfichier" class="form-control" multiple="">
      </div>
      <input type="submit" value="Envoyer le fichier" />
    </form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
