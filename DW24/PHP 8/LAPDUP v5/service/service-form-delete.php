<?php
	$id=$_GET['id'];
	$r = "select * from service where idservice = '".$id."'";
	require("../connexion.php");
	$res = mysqli_query($con, $r);
	$data = mysqli_fetch_assoc($res);
	mysqli_close($con);
	require("../head.php");
	require("../menu.php");
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="#">
	<div class="row">
		<div class="datadelete col-6">
			<fieldset>
				<legend>Service à supprimer</legend>
				<label>Id</label>
				<input type="text" name="idservice" value="<?php echo $data['idservice']; ?>" class="form-control" disabled>
				<input type="text" name="id" value="<?php echo $data['idservice']; ?>" hidden>
				<label>Nom</label>
				<input type="text" name="nomservice" value="<?php echo $data['nomservice']; ?>" class="form-control" disabled>
			</fieldset>
		</div>
		<div class="cledelete col-6">
			<i class="fa-solid fa-key"></i>
			<h2>Suppression</h2>
			<label>Entrez la clé de la suppression</label>
			<input type="password" name="cledelete" class="form-control" style="width: 300px;text-align: center; margin: auto;" autofocus>
			
			<div class="container mt-3">
    <div class="alert alert-warning" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i><br>Les données supprimées ne seront plus récupérables. Êtes-vous sûr de vouloir continuer ?
    </div>
    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i> Supprimer </button>
</div>

		</div>
	</div>

</form>
</div>
<?php
	extract($_POST);
	if (isset($cledelete)) 
	{
		if ($cledelete != "123")
		{
			echo "<div class='alert alert-info' role='alert'><center>
        <h4><i class='fa-solid fa-triangle-exclamation'></i> Clé de suppression incorrecte...</h4></center></div>";
		}
		else
		{
			$r = "delete from service where idservice = '".$id."'";
			require("../connexion.php");
			mysqli_query($con, $r);
			mysqli_close($con);
			require("../fonctions.php");
			redirection("service-list.php");
		}
	}
?>