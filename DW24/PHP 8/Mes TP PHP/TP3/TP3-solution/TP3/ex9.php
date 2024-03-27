<?php
	require("head.php");
	require("menu.php");
?>
<div class="container mt-8rem">
<form method="POST">
	Nom et prénom 
	<input type="text" name="nomprenom" class="form-control">
	
	Montant à créditer
	<input type="number" name="montant_credit" class="form-control">

	Nombre de mois de versement du crédit
	<select name=nombre_mois class="form-control">
		<?php
			for ($i = 6; $i<=36; $i+=6) 
				echo "<option>$i</option>";
		?>
	</select>

	Taux d’intérêt en %
	<input type="number" name="taux" class="form-control" min=10 max=50 step=5>

	<input type="submit" value="Afficher" class="btn btn-primary">
</form>
<?php
extract($_POST);
if (isset($nomprenom))
{
	echo "<h1 class=display-4>Simulateur des crédits</h1>";
	echo "<div class='alert alert-info'>";
		echo "Nom et prénom : <b>" . $nomprenom;
		echo "</b><br> Montant de crédits : <b>" .$montant_credit. " DH";
		echo "</b><br> Nombre de mois : <b>" .$nombre_mois. " mois";
		echo "</b><br> Taux d'intérêt : <b>" .$taux. " %";
	echo "</div>";

	echo "Tableau des versements";
	echo "<table class='table table-striped table-hover table-responsive'><th>Mois<th>A verser<th>Reste à verser";

	$total_a_verser = $montant_credit + ($montant_credit * $taux/100);
	//mav : montant à verser chaque mois;
	$mav = $total_a_verser / $nombre_mois ;
	//rav : reste à verser
	$rav = $total_a_verser - $mav;
	for ($i=1; $i<=$nombre_mois; $i++)
	{
		echo "<tr>";
		echo "<td>$i";
		echo "<td>".number_format($mav,2). " DH";
		echo "<td>".number_format($rav,2). " DH";
		$rav = $rav - $mav;
	}
	echo "</table>";



}
?>
</div>