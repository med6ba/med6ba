<?php
	require("../connexion.php");
	extract($_POST);
	
	echo $r = "update pointage 
	set idemploye = ".$idemploye.
	", datepointage = '".$datepointage.
	"', heuredentree = '".$heuredentree.
	"', heuresortie = '".$heuresortie.
	"', notes = '".$notes.
	"' where idp = ".$ancien_idp;
	
	//Exécution de la requête d'action
	mysqli_query($con, $r);
	mysqli_close($con);
	
	require("../fonctions.php");
	redirection("pointage-list.php");
?>