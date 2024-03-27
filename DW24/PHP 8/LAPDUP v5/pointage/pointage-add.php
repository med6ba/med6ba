<?php
	require("../connexion.php");
	extract($_POST);
	echo $r = "insert into pointage values(null,".$idemploye.", '".$datepointage."', '".$heureentree."', '".$heuresortie."', '".$notes."')";

	//Exécution de la requête d'action
	mysqli_query($con, $r);
	mysqli_close($con);
	
	require("../fonctions.php");
	redirection("pointage-list.php");
?>