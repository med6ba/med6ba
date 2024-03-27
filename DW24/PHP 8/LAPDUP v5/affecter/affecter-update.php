<?php
	require("../connexion.php");
	extract($_POST);
	
	echo $r = "update affecter 
	set idservice = '".$idservice.
	"', idemploye = ".$idemploye.
	", datedebut = '".$datedebut.
	"', datefin = '".$datefin.
	"' where idemploye = ".$ancien_ide. " and idservice = '".$ancien_ids. "' and datedebut = '". $ancien_dd. "'";
	
	//Exécution de la requête d'action
	mysqli_query($con, $r);
	mysqli_close($con);
	
	require("../fonctions.php");
	redirection("affecter-list.php");
?>