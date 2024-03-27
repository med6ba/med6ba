<?php
require("user-menu.php");
extract($_POST);
$photo = $_FILES['photo']['name'];
$change_photo = false;
if (!empty($photo)) 
{
	$change_photo = true;
	$type = $_FILES['photo']['type'];
	$taille = $_FILES['photo']['size'];
	$tmp = $_FILES['photo']['tmp_name'];
	if ($type != "image/png" && $type != "image/gif" && $type != "image/jpeg" && $type != "image/jpg")
		echo "<br>Erreur 01 : Veuillez entrer une image";
	else
	{
		$taille_acceptee = 500000;
		if ($taille > $taille_acceptee)
			echo "Erreur 02 : Veuillez entrer une image de taille < 500 ko";
		else
		{
			$photo = utf8_decode($photo); 
			$dossier = '../employe/images/'; 
			$uploading = false; 
			if (move_uploaded_file($tmp, $dossier.$photo))
				$uploading = true;
			if ($uploading == false)
				echo "Erreur 03 : uploading ECHEC...";
		}
	}
}
$r = "update employe set ";
$r .= "idemploye = $idemploye,";
if ($change_photo == true) 
 $r .= "photo =  '$photo',";
$r .="ncin =  '$ncin', ";
$r .="nom =  '$nom', ";
$r .="prenom =  '$prenom', ";
$r .="adresse =  '$adresse', ";
$r .="tel =  '$tel', ";
$r .="email =  '$email', ";
$r .="datedenaissance =  '$datedenaissance', ";
$r .="datederecrutement =  '$datederecrutement', ";
$r .="fonction =  '$fonction', ";
$r .="specialite =  '$specialite', ";
$r .="salairenet = $salairenet ";
$r .= " where idemploye = $idemploye";

require("../connexion.php");
mysqli_query($con, $r);
require("../fonctions.php");
redirection("user-mespointages.php");
$_SESSION['nom']=$nom;
$_SESSION['prenom']=$prenom;
?>
	