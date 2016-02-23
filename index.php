<?php 
  include('includes/connexion_bdd.inc.php');
  include('includes/header.inc.php');
?>
  <div class="jumbotron">
    <div class="container">
      <h1>Bonjour !</h1>
      <p>Voici mon blog ! a remplir ! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores esse, molestiae tempore hic sint harum beatae quam incidunt dolorum et.</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php 
        if(isset($_POST['Recherche'])){
          $recherche = $_POST['Recherche'] ;
          //$rech = $bdd->query("SELECT * FROM articles WHERE contenu LIKE '%$recherche%'");
          $mots = explode(" ", $recherche) ;

          if( count( $mots ) > 0 ) {
             $query = "SELECT * FROM articles WHERE ";
             for( $i = 0; $i < count( $mots ); $i++ ) {
                $query .= "contenu LIKE '%". $mots[$i] ."%'";
                if( $i < count( $mots ) - 1 )
                   $query .= " AND ";
             }
             $rech = $bdd->query($query);
          }

          while ($donnees = $rech->fetch())
            {
            ?>
              <div class="col-md-4">
                <h2><?php echo $donnees['titre']; ?></h2>
                <?php
                if(file_exists(dirname(__FILE__).'/data/images/'.$donnees['id'].'.jpg')){
                  echo '<img src = "data/images/'.$donnees['id'].'.jpg" width=350px>';
                } ?>
                <p><?php echo nl2br($donnees['contenu']); ?></p>
                <p><?php echo date("M d Y H:i", $donnees['date']) ;?> </p>
                <?php if($connecte == true){ 
                  echo '<a href="article.php?id='.$donnees['id'].'" ><button class="btn btn-info">Modifier</button></a>' ;
                  echo '<a href="supprimer.php?id='.$donnees['id'].'"><button class="btn btn-info">Supprimer</button></a>';
                } ?>
              </div>
            <?php
            }
          $rech->closeCursor();

        }else{
          $reponse = $bdd->query('SELECT * FROM articles');

          while ($donnees = $reponse->fetch())
            {
            ?>
              <div class="col-md-4">
                <h2><?php echo $donnees['titre']; ?></h2>
                <?php
                if(file_exists(dirname(__FILE__).'/data/images/'.$donnees['id'].'.jpg')){
                  echo '<img src = "data/images/'.$donnees['id'].'.jpg" width=350px>';
                } ?>
                <p><?php echo nl2br($donnees['contenu']); ?></p>
                <p><?php echo date("M d Y H:i", $donnees['date']) ;?> </p>
                <?php if($connecte == true){ 
                  echo '<a href="article.php?id='.$donnees['id'].'" ><button class="btn btn-info">Modifier</button></a>' ;
                  echo '<a href="supprimer.php?id='.$donnees['id'].'"><button class="btn btn-info">Supprimer</button></a>';
                } ?>
              </div>
            <?php
            }
          $reponse->closeCursor();
        }
          include('includes/footer.inc.php')
      ?>


