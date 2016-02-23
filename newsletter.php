<?php 
	include("includes/connexion_bdd.inc.php");

	$email = $_POST['email'] ;

	$req = $bdd->query("SELECT email FROM utilisateurs WHERE email = '$email'");

	if($req == $email){
		echo 'Vous êtes deja abonné !' ;
	}else{
		$req1 = $bdd->prepare('INSERT INTO newsletter(email) VALUES(:email)');
		$req1->execute(array(
				'email' => $email,
				));
		$req1->closeCursor();	
		echo 'Vous vous êtes abonné !' ;
	}
?>

