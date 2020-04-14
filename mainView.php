<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Upload de fichiers</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form method="post" action="upload" enctype="multipart/form-data">
            <div class="form-group files">
              <label>Upload Your File </label>
              <input type="file" name="monfichier" class="form-control" multiple="">
            </div>
            <input type="submit" value="Envoyer le fichier" />
          </form>
            <?php
            var_dump($result);
            if(isset($result)){
              echo($result);
            }
            ?>
        </div>
      </div>
    </div>
    </body>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="script/script.js"></script>
</html>
