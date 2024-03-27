<?php
	require("../connexion.php");
	extract($_POST);
	$r = "insert into affecter values(".$idemploye.", '".$idservice."', '".$datedebut."', '".$datefin."')";

	//Exécution de la requête d'action
	mysqli_query($con, $r);
	mysqli_close($con);
	
	require("../fonctions.php");
	redirection("affecter-list.php");
?>