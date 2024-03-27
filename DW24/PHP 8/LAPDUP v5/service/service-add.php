<?php
	extract($_POST);
	$r = "insert into service 
	values ('".$idservice."', '".$nomservice."')";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("service-list.php");
?>