<?php
function redirection($url)
{
	if (headers_sent())
		print('<meta http-equiv="refresh" content="0;URL='.$url.'">');
	else 
		header("Location: $url");
}
function moncrypte($mdp)
{
	$mon_mdp = "";
	for ($i=0; $i<=strlen($mdp); $i++)
		$mon_mdp .=ord($mdp[$i]);
	
	$mon_mdp.=strlen($mdp);
	return $mon_mdp;
}
function FormatTel($phoneNumber) {
    // Supprime tout ce qui n'est pas un chiffre
    $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
    
    // Formate le numéro avec des espaces
    return preg_replace('/(\d{2})(?=\d)/', '$1-', $phoneNumber);
}

?>