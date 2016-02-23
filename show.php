<?php 
	var_dump($_GET) ;
		/*include('includes/connexion_bdd.inc.php');
		include ("includes/header.inc.php");
		echo'<div class="container">
    			<div class="row">';
		$reponse = $bdd->query('SELECT id FROM articles');
		
          while ($donnees = $reponse->fetch())
            {
            	if($donnees['id'] == $_GET){
					echo '<div class="col-md-4">' ;
	                echo '<h2>'.$donnees['titre'].'</h2>';

	                if(file_exists(dirname(__FILE__).'/data/images/'.$donnees['id'].'.jpg')){
	                  echo '<img src = "data/images/'.$donnees['id'].'.jpg" width=350px>';
	                }

	                echo '<p>'.nl2br($donnees['contenu']).'</p>' ;
	                echo '<p>'.date("M d Y H:i", $donnees['date']).'</p>';
	                if($connecte == true){ 
	                	echo '<a href="article.php?id='.$donnees['id'].'" ><button class="btn btn-info">Modifier</button></a>' ;
	                	echo '<a href="supprimer.php?id='.$donnees['id'].'"><button class="btn btn-info">Supprimer</button></a>';
	                }
	              echo '</div>' ;
	            }

	    $reponse->closeCursor();*/

		include ("includes/footer.inc.php");
	
?>