<?php
	include('includes/header.inc.php');
	include('includes/connexion_bdd.inc.php');
	include('includes/verification_utilisateur.inc.php');

	if(isset($_POST['inputEmail'])){

		$email = $_POST['inputEmail'] ;
		$pwd = $_POST['inputPassword'] ;
		$req = $bdd->query("SELECT * FROM utilisateurs WHERE email = '$email'");
		$connect = false ;

		while ($donnees = $req->fetch())
		{
			if($pwd == $donnees['mdp']){
				echo 'Mot de passe incorrect !' ;
				$connect = true ;
			}
		}

		$req->closeCursor();

		if($connect == true ){
			$sid = MD5($email.time());
			$update = $bdd->exec("UPDATE utilisateurs SET sid= '$sid' WHERE email= '$email'");
			setcookie('id', $sid, time()+180);
			header('Location:index.php');
		}else{
			echo 'adresse email non valide !' ;
		}
	}

?>


<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="form-signin-heading">Connexion</h2>
	      	<form class="form-horizontal" method='post'>
	        	<div class="form-group">
		        	<label for="inputEmail">Adresse Email</label>
		        	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
		        </div>
		        <div class="form-group">
		        	<label for="inputPassword">Mot de passe</label>
		        	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
				</div>
	        	<button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
	      	</form>
		</div>
		<div class="col-md-4"></div>
	</div>

<?php 
	include('includes/footer.inc.php') ;
?>