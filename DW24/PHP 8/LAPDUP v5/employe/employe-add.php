<?php
extract($_POST);
$photo = $_FILES['photo']['name'];
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
echo $r = "insert into employe values(NULL,'$photo','$ncin','$nom','$prenom','$adresse','$tel','$email','$datedenaissance','$datederecrutement','$fonction','$specialite',$salairenet,'".sha1(mot_de_passe)."')";

require("../connexion.php");
mysqli_query($con, $r);
require("../fonctions.php");
redirection("employe-list.php");
?>
	