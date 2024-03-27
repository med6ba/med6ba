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
	for ($i=0; $i<=$nombre; $i++)
		if ($i % 3 != 0)
			echo $i." ";
}
?>
</div>