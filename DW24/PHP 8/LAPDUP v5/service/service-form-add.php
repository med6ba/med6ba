<?php
	require("../head.php");
	require("../menu.php");
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="service-add.php">
	<fieldset>
		<legend>Formulaire Service</legend>
		<label>Id</label>
		<input type="text" name="idservice" class="form-control">
		<label>Nom</label>
		<input type="text" name="nomservice" class="form-control">
        <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
	</fieldset>
</form>
</div>
