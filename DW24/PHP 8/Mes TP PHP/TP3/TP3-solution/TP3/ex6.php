<?php
	require("head.php");
	require("menu.php");
?>
<div class="container mt-8rem">
<form method="POST">
	Entrez un nombre
	<input type=number name=nombre class="form-control">
	<input type="submit" value="Afficher" class="btn btn-primary">
</form>
<?php
extract($_POST);
if (isset($nombre))
{
	$s = 0; //s : La valeur de la somme.
	for ($i=1; $i<=$nombre; $i++) 
		$s = $s + $i;
	echo "<div class='alert alert-info'>";
	echo "La somme de 1 à $nombre est : $s";
	echo "</div>";

	$f = 1; 
	for ($i=1; $i<=$nombre; $i++) 
		$f = $f * $i;
	echo "<div class='alert alert-info'>";
	echo "Le factoriel de $nombre est : $f";
	echo "</div>";
}
?>
</div>