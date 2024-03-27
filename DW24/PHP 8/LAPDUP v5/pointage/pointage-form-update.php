<?php 
    require("../head.php");
    	$active = 4;
    require("../menu.php");
    $id=$_GET['id'];
    $r = "select * from pointage where idp = '".$id."'";
    require("../connexion.php");
    $res = mysqli_query($con, $r);
    $data = mysqli_fetch_assoc($res);
    mysqli_close($con);
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="pointage-update.php">
<fieldset>
		<legend>Formulaire de pointage</legend>
	Numéro de pointage<br>
	<input type="text" name="ancien_idp" value =<?php echo $id; ?> disabled>
	<input type="text" name="ancien_idp" value =<?php echo $id; ?> hidden>
	

	<div class="form-group">
		<label>Id Employé</label>
		<select name="idemploye" class="form-control">
			<option selected></option>
			<?php
			require("../connexion.php");
			$r = "select * from employe";
			$res = mysqli_query($con, $r);
			while ($datae = mysqli_fetch_assoc($res))
			{
				if ($datae['idemploye'] == $data['idemploye'])
					echo "<option value=".$datae['idemploye']." selected>".strtoupper($datae['nom'])." ". ucfirst(strtolower($datae['prenom'])). "</option>";
				else
					echo "<option value=".$datae['idemploye'].">".strtoupper($datae['nom'])." ". ucfirst(strtolower($datae['prenom'])). "</option>";
			}
			mysqli_close($con);
			?>
		</select>
	</div>

	<div class="row">
	    <div class="col">
	        <div class="form-group">
	            <label>Date de pointage</label>
	            <input type="date" class="form-control" name="datepointage" value="<?php echo $data['datepointage']; ?>">
	        </div>
	    </div>
	    <div class="col">
	        <div class="form-group">
	            <label>Heure d'entrée</label>
	            <input type="time" class="form-control" name="heuredentree" value="<?php echo $data['heuredentree']; ?>">
	        </div>
	    </div>
	    <div class="col">
	        <div class="form-group">
	            <label>Heure de sortie</label>
	            <input type="time" class="form-control" name="heuresortie" value="<?php echo $data['heuresortie']; ?>">
	        </div>
	    </div>
	</div>


		<div class="form-group">
			<label>Commentaires</label>
			<textarea name=notes class="form-control" rows="3" style="background-color: lightgray;"><?php echo $data['notes']; ?></textarea>
		</div>

	<br>
        	<button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
</fieldset>
</form>
<?php
	require("../footer.php");
?>