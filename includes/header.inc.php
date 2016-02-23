<?php include('verification_utilisateur.inc.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projet Blog php">
    <meta name="author" content="Maxime Gonzalez">


    <title>Blog Maxime Gonzalez</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">

      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" >Maxime Gonzalez</a>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav navbar-right">
            <?php if($connecte == false){ ?>
              <li><a href="connexion.php">Se connecter</a></li>
              <li><a href="inscription.php">S'inscrire</a></li>
            <?php }else{ ?>
              <li><a href="article.php">Rédiger un article</a></li>
              <li><a href="deconnexion.php">Deconnexion</a></li>
            <?php } ?>
            </ul>

          <div class="col-sm-3 col-md-3" style="margin-top: 9px;">
            <div class="nav navbar-nav">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Email" name="newsletter" id="newsletter">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">S'abonner newsletter</button>
                  </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-3 col-md-3 pull-right">
          <form class="navbar-form" method="post" action="index.php">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Recherche" name="Recherche" id="Recherche">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">Recherche</button>
              </div>
          </div>
          </form>
          </div>
      </div>
    </div>