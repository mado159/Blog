<?php include('includes/header.inc.php');

	if(isset($_POST['inputTitre'])){
		$titre = $_POST['inputTitre'] ;
		$contenu = $_POST['inputContenu'] ;

		if(isset($_POST['id'])){

			$id = (int)$_POST['id'];
			$modifArt = $bdd->prepare('UPDATE articles SET titre = :titre , contenu = :contenu WHERE id = :id') ;
			$modifArt->execute(array(
					'titre' => $titre,
					'contenu' => $contenu,
					'id' => $id
					));

			$modifArt->closeCursor();
			header('Location:index.php') ;
		}else{
			$req = $bdd->prepare('INSERT INTO articles(titre,contenu,date) VALUES(:titre, :contenu, UNIX_TIMESTAMP())');
			$req->execute(array(
					'titre' => $titre,
					'contenu' => $contenu
					));

			$idDernierArt = $bdd->lastInsertId();
			move_uploaded_file($_FILES['inputFile']['tmp_name'],dirname(__FILE__).'/data/images/'.$idDernierArt.'.jpg') ;

			$req->closeCursor();
			header('Location:index.php') ;
		}
	}else{
		if(isset($_GET['id'])){
			$id = (int)$_GET['id'] ;
			$reponse = $bdd->query("SELECT * FROM articles WHERE id= '$id'");

	        while ($donnees = $reponse->fetch())
	        {
				$titre = $donnees['titre'];
				$contenu = $donnees['contenu'] ;
			}
		}
	}

?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Rédiger un article</h2>

			<form class="form-horizontal" method='post' enctype="multipart/form-data">
				<?php if (isset($_GET['id'])){ ?>
					<input type="hidden" name="id" value="<?= $id ?>">
				<?php } ?>
			    <div class="form-group">
				   	<label for="inputTitre">Titre</label>
				   	<input type="text" id="inputTitre" name="inputTitre" class="form-control" placeholder="Titre" value = "<?php if(isset($_GET['id'])) echo $titre  ?>" required autofocus>
				</div>
				<div class="form-group">
				   	<label for="inputContenu">Contenu</label>
				   	<textarea id="inputContenu" name="inputContenu"  class="form-control" rows="9" required><?php if(isset($_GET['id'])) echo $contenu ?></textarea>
				</div>
				<div class="form-group">
    				<label for="inputFile">Ajouter une image</label>
    				<input type="file" id="inputFile" name="inputFile" >
    			</div>
			    <button class="btn btn-lg btn-primary btn-block" type="submit">Publier</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>

<?php include('includes/footer.inc.php');?>