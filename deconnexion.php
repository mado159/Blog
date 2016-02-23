<?php include('includes/verification_utilisateur.inc.php');

		$connecte = false ;
		setcookie('id', NULL, -1);
		header("Location:index.php");
?>