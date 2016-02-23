<?php
	include('includes/connexion_bdd.inc.php');
	$connecte=false;
	if(isset($_COOKIE['id']) && ! empty($_COOKIE['id'])){
		$sid = $_COOKIE['id'];
		$sql = $bdd->query("SELECT email FROM utilisateurs WHERE sid = '$sid'");

		while ($donnees = $sql->fetch())
     	{
       		$connecte = true ;
       		$email_util = $donnees['email'];
       	}
	}
?>