<?php
	extract($_POST);
	$r = "update service
	set idservice = '".$idservice."',
	nomservice = '".$nomservice."'
	where idservice = '".$id."'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("service-list.php");
?>