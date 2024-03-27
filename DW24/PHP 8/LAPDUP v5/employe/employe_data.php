<?php
require("../connexion.php");
$ide = $_GET['ide'];
$r = "select * from employe where idemploye = " . $ide;
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
$reponse = array('idemploye' => $data['idemploye'], 
'photo' => $data['photo'],
'nomprenom' => $data['nom']. ' ' . $data['prenom'], 
'datederecrutement' => $data['datederecrutement']);
echo json_encode($reponse);
mysqli_close($con);

?>