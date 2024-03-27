<?php
	require("../head.php");
	$active = 4;
	require("../menu.php");
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="pointage-add.php">
	<fieldset>
		<legend>Formulaire de pointage</legend>

		<label>Sélectionnez un Employé</label>
		<select name="idemploye" id = "ide" class="form-control" onchange="afficher_infos_employe()">
			<option selected disabled>Sélectionnez un employé</option>
			<?php
				require("../connexion.php");
				$r = "select * from employe";
				$res = mysqli_query($con, $r);
				while ($data = mysqli_fetch_assoc($res))
				{
					echo "<option value=".$data['idemploye'].">";
					echo $data['nom'] . " " . $data['prenom'];
				}
				mysqli_close($con);
			?>
		</select>
		<div id="infos_employe"></div>
		<?php
		$aujourdhui = date("Y-m-d");
		$heureentree = "09:00";
		$heuresortie = "15:00";
		?>

		<div class="row">
		    <div class="col">
		        <div class="form-group">
		            <label>Date de pointage</label>
		            <input type="date" class="form-control" name="datepointage" value="<?php echo $aujourdhui; ?>">
		        </div>
		    </div>
		    <div class="col">
		        <div class="form-group">
		            <label>Heure d'entrée</label>
		            <input type="time" class="form-control" name="heureentree" value="<?php echo $heureentree; ?>">
		        </div>
		    </div>
		    <div class="col">
		        <div class="form-group">
		            <label>Heure de sortie</label>
		            <input type="time" class="form-control" name="heuresortie" value="<?php echo $heuresortie; ?>">
		        </div>
		    </div>
		</div>

		<div class="form-group">
			<label>Commentaires</label>
			<textarea name=notes class="form-control" rows="3" style="background-color: lightgray;">Aucun</textarea>
		</div>

    	<button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> Enregistrer
        </button>
	</fieldset>
</form>
</div>
<script>
	function afficher_infos_employe(){
		// Sélection de l'élément select avec l'ID "ide"
var employe_slct = document.getElementById("ide");

// Sélection de l'option actuellement sélectionnée dans le select
var selectedOption = employe_slct.options[employe_slct.selectedIndex];

// Sélection de l'élément où afficher les informations de l'employé
var infos_employe = document.getElementById("infos_employe");

// Récupération de la valeur de l'option sélectionnée (id de l'employé)
var ide = selectedOption.value;

// Utilisation de AJAX pour récupérer les données de l'employé
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
    // Vérification de l'état de la requête
    if (xhr.readyState === XMLHttpRequest.DONE) {
        // Conversion de la réponse JSON en objet JavaScript
        var reponse = JSON.parse(xhr.responseText);

        // Extraction des données de la réponse
        var idemploye = reponse.idemploye;
        var photo = reponse.photo;
        var nomprenom = reponse.nomprenom;
        var datederecrutement = reponse.datederecrutement;

        // Création du contenu HTML à afficher
        var detailshtml = "Id : <strong>" + idemploye + "</strong><br>" 
            + "<img src='../employe/images/" + photo + "' width=40>"
            + "<strong> " + nomprenom + "</strong><br>"
            + "Date de recrutement : <strong> " + datederecrutement + "</strong><br>";

        // Mise à jour du contenu de l'élément infos_employe
        infos_employe.innerHTML = detailshtml;
    }
};

// Configuration de la requête AJAX
xhr.open("GET", "../employe/employe_data.php?ide="+ide, true);

// Envoi de la requête AJAX
xhr.send();

	}
</script>
