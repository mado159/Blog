<?php
  include('includes/connexion_bdd.inc.php');
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
			$modifArt = $bdd->prepare('DELETE FROM articles WHERE id = :id') ;
			$modifArt->execute(array(
					'id' => $id
					));

			$modifArt->closeCursor();
			if(file_exists(dirname(__FILE__).'/data/images/'.$id.'.jpg')){
                unlink('../data/images/'.$id.'.jpg');
              }
				

			header('Location:index.php') ;
	}
?>