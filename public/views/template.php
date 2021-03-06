<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PDF-Converter</title>
        <meta name="description" content="PDF-Converter est une application qui vous permet de compresser gratuitement et simplement vos fichiers PDF volumineux." />
        <meta name="robots" content="all" />
        <meta name="language" content="fr" />
          <!-- Meta facebook-->
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="www.jeremy-hennebique.com/img/pdf-converter_min.png"/>
        <meta property="og:title" content="PDF-Converter"/>
        <meta property="og:url" content="www.pdf-converter.jeremy-hennebique.com/"/>
        <meta property="og:description" content="PDF-Converter est une application qui vous permet de compresser gratuitement et simplement vos fichiers PDF volumineux."/>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="vendor/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">

    </head>
    <body>
    <header id=""class="container">
      <div class="row">
          <div class="col-xs-8">
            <h1>PDF-Converter</h1>
            <h4>PDF-Converter est une application qui vous permet de compresser gratuitement et simplement vos fichiers PDF volumineux</h4>
          </div>
          <div class="col-xs-4">
            <img class="img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/d/dc/PDF_Expert_Logo.svg">
          </div>

      </div>
    </header>
    <section id="upload">
        <!--Contenu dynamique php-->
        <?= $content ?>
    </section>

    </body>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src="public/script/pdf.js"></script>
  <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src="public/script/script.js"></script>

</html>
