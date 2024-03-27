<?php
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
			$dossier = 'images/'; 
			$uploading = false; 
			if (move_uploaded_file($tmp, $dossier.$photo))
				$uploading = true;
			if ($uploading == false)
				echo "Erreur 03 : uploading ECHEC...";
		}
	}
}
$r = "update employe set ";
$r .= "idemploye = $ancien_cle,";
if ($change_photo == true) 
 $r .= "photo =  '$photo',";
$r .="ncin =  '$ncin', ";
$r .="nom =  '$nom', ";
$r .="prenom =  '$prénom', ";
$r .="adresse =  '$adresse', ";
$r .="tel =  '$tel', ";
$r .="email =  '$email', ";
$r .="datedenaissance =  '$datedenaissance', ";
$r .="datederecrutement =  '$datederecrutement', ";
$r .="fonction =  '$fonction', ";
$r .="specialite =  '$specialite', ";
$r .="salairenet = $salairenet, ";
$r .="motdepasse =  '".sha1($motdepasse)."'";
$r .= " where idemploye = $ancien_cle";

require("../connexion.php");
mysqli_query($con, $r);
require("../fonctions.php");
redirection("employe-list.php");

?>
	