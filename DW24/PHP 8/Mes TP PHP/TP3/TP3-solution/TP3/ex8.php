<?php
	require("head.php");
	require("menu.php");
?>
<div class="container mt-8rem">
<form method="POST">
	Année
	<select name=annee class="form-control">
	<?php
		for ($i=2000; $i<=date("Y"); $i++)
			echo "<option>$i</option>";
	?>
	</select>
	<input type="submit" value="Afficher" class="btn btn-primary">
</form>
<?php
extract($_POST);
if (isset($annee))
{
	echo "<table class='table table-striped table-hover table-responsive'>
			<th>Ligne
			<th>Année
			<th>Mois";
	$nombre_dannee = date("Y") - $annee + 1;
	$nombre_mois = $nombre_dannee * 12;
	$nombre_mois = $nombre_mois - (12 - date("m"));
	$mois = 1;
	$j = 13;
	for ($i=1; $i<=$nombre_mois; $i++)
	{
		echo "<tr>";
		echo "<td>$i";
		if ($i==$j)  
		{
			$annee++; $j+=12;
		}
		echo "<td>$annee";
		echo "<td>$mois";
		$mois++;
		if ($mois==13) $mois=1;
	}
}
?>
</div>