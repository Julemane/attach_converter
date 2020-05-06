<?php ob_start(); ?>
    <form method="post" action="?action=upload" enctype="multipart/form-data">
      <div class="form-group files">
        <label>Upload Your File </label>
        <input type="file" name="monfichier" class="form-control" multiple="">
      </div>
      <input type="submit" value="Envoyer le fichier" />
    </form>
    <div>
      <?php
      if(isset($result)){
        echo('<span class="oi oi-file" title="icon name" aria-hidden="true">'.$result["status"].'</span>');
        if($result["code"] == 0){
          //to do formulaire ou bouton declenchant la fonction de convertion du fichier vers l'api (utilisation des data du tableau $result)
          //masquage en js des action non realisable à se stade
          //gestion des niveaux de compression : low-med-high
        }

      };
      ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
