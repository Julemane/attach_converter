<?php ob_start(); ?>

<form method="post" action="?action=upload" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Upload File</label>
            <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Preview</b></div>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                      <i class="fa fa-times"></i> Reset The Field
                    </button>
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="glyphicon glyphicon-download-alt"></i>
                <p>Choose an image file or drag it here.</p>
              </div>
              <input type="file" name="monfichier" class="dropzone" accept = ".pdf">>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary pull-right">Upload</button>
        </div>
      </div>
    </div>
  </form>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
          if(isset($result)){
            echo('<span class="oi oi-file" title="icon name" aria-hidden="true"></span>'.$result["status"].". Taille ".$result["size"]." ko");
            if($result["code"] == 0){
              ?>

          <form method="post" action="?action=convert" enctype="multipart/form-data">
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-6 pt-0">Selectionnez le niveau de compression</legend>
                  <div class="col-sm-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="compressionLevel" id="gridRadios1" value="recommended" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Standard
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="compressionLevel" id="gridRadios2" value="low">
                      <label class="form-check-label" for="gridRadios2">
                        Faible
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="compressionLevel" id="gridRadios3" value="extreme">
                      <label class="form-check-label" for="gridRadios3">
                        Maximum
                      </label>
                    </div>
                    <?php
                    if(!is_null($result["renamedfile"])){
                      echo("<input type='hidden' value=".$result["renamedfile"]." name='fileName'>");

                    }?>
                  </div>
                </div>
              </fieldset>
            <input type="submit" value="Lancer la compression" />
          </form>
        </div>
      </div>
    </div>
          <?php

        }

      };
      ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
