<?php
	include('includes/header.inc.php');
	include('includes/connexion_bdd.inc.php');

	if(isset($_POST['inputEmail'])){
		//inititialisation des verifications pour le mail et le mot de passe
		$verif_email = true ;
		$verif_pwd = true ;

		$email = $_POST['inputEmail'] ;
		$pwd = $_POST['inputPassword'] ;
		$pwdA = $_POST['inputPasswordAgain'];
		$prenom = $_POST['inputPrenom'];
		$nom = $_POST['inputNom'];
		$sid = MD5($email.time());

		$req = $bdd->query("SELECT email FROM utilisateurs WHERE email = '$email'");//recuperation des email deja enregistrer qui corresponde aves l'email entree

		if(!preg_match("#([a-z0-9\.\-_]+@[a-z0-9\.\-_]+\.[a-z]+)#",$email)){ // verification de la syntaxe de l'email
			echo 'Veuillez entrer une adresse email correcte !' ;
			$verif_email = false ;
		}

		while ($donnees = $req->fetch())//si on a trouver un resultat l'email existe deja 
		{
			echo 'Cette adresse email existe deja !' ;
			$verif_email = false ;
		}

		if($_POST['inputPassword'] != $_POST['inputPasswordAgain']){//verification de mot de passe 
			echo 'Erreur verification de mot de passe' ;
			$verif_pwd = false ;
		}
		if($verif_email == true && $verif_pwd == true){//si l'email n'est pas deja dans la base de donnee et si le mot de passe est confrome alors on ajoute
			$req1 = $bdd->prepare('INSERT INTO utilisateurs(prenom,nom,email,mdp,sid) VALUES(:prenom, :nom, :email, :mdp, :sid)');
			$req1->execute(array(
					'prenom' => $prenom,
					'nom' => $nom,
					'email' => $email,
					'mdp' => $pwd,
					'sid' => $sid
					));
			$req1->closeCursor();
			
			header('Location:index.php');//redirection vers la page index.php
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="form-signin-heading">Inscription</h2>
	      	<form class="form-horizontal" method='post'>
	        	<div class="form-group">
		        	<label for="inputEmail">Adresse Email</label>
		        	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
		        </div>
		        <div class="form-group">
		        	<label for="inputPassword">Mot de passe</label>
		        	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
				</div>
		        <div class="form-group">
		        	<label for="inputPasswordAgain">Confirmer Mot de passe</label>
		        	<input type="password" id="inputPasswordAgain" name="inputPasswordAgain" class="form-control" value="root" placeholder="Confirmer Mot de passe" required>
				</div>
		        <div class="form-group">
		        	<label for="inputPrenom">Prénom</label>
		        	<input type="text" id="inputPrenom" name="inputPrenom" class="form-control" placeholder="Prénom" value="maxime" required>
				</div>
		        <div class="form-group">
		        	<label for="inputNom">Nom</label>
		        	<input type="text" id="inputNom" name="inputNom" class="form-control" placeholder="Nom" value="gonzalez" required>
		        </div>
	        	<button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
	      	</form>
		</div>
		<div class="col-md-4"></div>
	</div>

<?php 
	include('includes/footer.inc.php') ;
?>