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
<div class="container" style="margin-top:100px">
<form method="POST" action="service-update.php">
	<fieldset>
		<legend>Formulaire Service</legend>
		<label>Id</label>
		<input type="text" name="idservice" value="<?php echo $data['idservice']; ?>" class="form-control">
		<input type="text" name="id" value="<?php echo $data['idservice']; ?>" hidden>
		<label>Nom</label>
		<input type="text" name="nomservice" value="<?php echo $data['nomservice']; ?>" class="form-control">
<button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>	</fieldset>
</form>
</div>