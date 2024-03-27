<?php
	require("../head.php");
	require("../menu.php");
	$id=$_GET['id'];
    $parts = explode("|", $id);
    $ids = $parts[0]; 
    $ide = $parts[1]; 
    $dd = $parts[2]; 
    $r = "select * from affecter where idservice = '".$ids."'and idemploye = ". $ide." and datedebut = '".$dd."';" ;
    require("../connexion.php");
    $res = mysqli_query($con, $r);
    $data = mysqli_fetch_assoc($res);
    $df = $data['datefin'];
    mysqli_close($con);
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="affecter-update.php">
<fieldset>
		<legend>Formulaire d'affectation</legend>

	<input type="text" name="ancien_ide" 
	value =<?php echo $ide; ?> >
	<input type="text" name="ancien_ids" 
	value =<?php echo $ids; ?> >
	<input type="text" name="ancien_dd" 
	value =<?php echo $dd; ?> >

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
				if ($datae['idemploye'] == $ide)
					echo "<option value=".$datae['idemploye']." selected>".strtoupper($datae['nom'])." ". ucfirst(strtolower($datae['prenom'])). "</option>";
				else
					echo "<option value=".$datae['idemploye'].">".strtoupper($datae['nom'])." ". ucfirst(strtolower($datae['prenom'])). "</option>";
			}
			mysqli_close($con);
			?>
		</select>
	</div>

	<div class="form-group">
	<label>Id Service</label>
		<select name="idservice" class="form-control">
			<option selected></option>
			<?php
			require("../connexion.php");
			$r = "select * from service";
			$res = mysqli_query($con, $r);
			while ($datas = mysqli_fetch_assoc($res))
			{
				
				if ($datas['idservice'] == $ids)
					echo "<option value=".$datas['idservice']." selected >".$datas['nomservice']. "</option>";
				else
					echo "<option value=".$datas['idservice'].">".$datas['nomservice']. "</option>";
			}
			mysqli_close($con);
			?>
		</select>
	</div>

	<div class="form-group">
	<label>Date début d'affectation</label>
		<input type="date" class="form-control" name="datedebut" value=<?php echo $dd; ?>>
	</div>
	
	<div class="form-group">
	<label>Date Fin</label>
		<input type="date" class="form-control" name="datefin" value=<?php echo $df; ?>>
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