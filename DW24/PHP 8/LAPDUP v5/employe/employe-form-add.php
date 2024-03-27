<?php 
require("../head.php");require("../menu.php");
echo "<div class='container' style='margin-top: 100px;'>";
echo "<form method=POST action='employe-add.php' enctype='multipart/form-data'>";
echo "
<fieldset>
<legend>Formulaire employe</legend>";
echo "<div class=row>";
echo "<div class=col-md-6>";
require("../connexion.php");
$r = "select * from employe";
$res = mysqli_query($con, $r);
$num = mysqli_num_rows($res);
$num++;
echo "<label>Idemploye</label>";
echo "<input type='number' name='idemploye' class='form-control' style='width:200px;' value = $num disabled>";
echo "<label>Photo</label>";
echo "<input type='file' name='photo' id='file' accept='image/*'' class='form-control'><div class='img-area' data-img=''></div><button class='select-image btn btn-success' hidden>Select Image</button>";
echo "<label>Ncin</label>";
echo "<input type='text' name='ncin' class='form-control'>";
echo "<label>Nom</label>";
echo "<input type='text' name='nom' class='form-control'>";
echo "<label>Prenom</label>";
echo "<input type='text' name='prenom' class='form-control'>";
echo "<label>Adresse</label>";
echo "<textarea name='adresse' class='form-control' rows=4></textarea>";
echo "<label>Tel</label>";
echo "<input type='text' name='tel' class='form-control'>";
echo "</div>";
echo "<div class=col-md-6>";
echo "<label>Email</label>";
echo "<input type='text' name='email' class='form-control'>";
echo "<label>Datedenaissance</label>";
echo "<input type='date' name='datedenaissance' class='form-control'>";
echo "<label>Datederecrutement</label>";
echo "<input type='date' name='datederecrutement' class='form-control'>";
echo "<label>Fonction</label>";
echo "<input type='text' name='fonction' class='form-control'>";
echo "<label>Specialite</label>";
echo "<input type='text' name='specialite' class='form-control'>";
echo "<label>Salairenet</label>";
echo "<input type='number' name='salairenet' class='form-control'>";
echo "<label>Motdepasse</label>";
echo "<input type='password' name='motdepasse' class='form-control'>";
echo "</div>";
echo "</div>";
echo "</fieldset>";
echo "<br><br><br><button type='submit' class='btn btn-primary'>";
echo "<i class='fas fa-save'></i> Enregistrer</button>";
echo "</form>";
echo "</div>";
?>
<script src="script.js"></script>
