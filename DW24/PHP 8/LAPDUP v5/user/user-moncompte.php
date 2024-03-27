<?php 
    require("../head.php");
    $active=1;
    require("user-menu.php");
    $id=$_GET['id'];
    $r = "select * from employe where idemploye = ".$idemploye;

    require("../connexion.php");
    $res = mysqli_query($con, $r);
    $data = mysqli_fetch_assoc($res);
    mysqli_close($con);
    
echo "<div class='container' style='margin-top: 100px;'>";
echo "<form method=POST action='user-moncompte-update.php' enctype='multipart/form-data'>";
echo "
<fieldset>
<legend>Mon compte</legend>";
echo "<div class=row>";
echo "<div class=col-md-6>";
echo "<label>Ide</label>";
echo "<input type='number' name='idemploye' class='form-control' style='width:200px;' value=".$data['idemploye']." disabled>";
echo "<input type='number' name='ancien_cle' class='form-control' style='width:200px;' value=".$data['idemploye']." hidden>";
echo "<label>Photo</label>";
echo "<input type='file' name='photo' id='file' accept='image/*'' class='form-control'><div class='img-area' data-img=''><img src='../employe/images/".$data['photo']."'></div><button class='select-image btn btn-success' hidden>Select Image</button>";
echo "<label>Ncin</label>";
echo "<input type='text' name='ncin' class='form-control' value='".$data['ncin']."'>";
echo "<label>Nom </label>";
echo "<input type='text' name='nom' class='form-control' value='".$data['nom']."'>";
echo "<label>Prénom </label>";
echo "<input type='text' name='prenom' class='form-control' value='".$data['prenom']."'>";
echo "<label>Adresse</label>";
echo "<textarea name='adresse' class='form-control' rows=4>".$data['adresse']."</textarea>";
echo "<label>Tel</label>";
echo "<input type='text' name='tel' class='form-control' value='".$data['tel']."'>";
echo "</div>";
echo "<div class=col-md-6>";
echo "<label>Email</label>";
echo "<input type='text' name='email' class='form-control' value='".$data['email']."'>";
echo "<label>Date de naissance</label>";
echo "<input type='date' name='datedenaissance' class='form-control' value='".$data['datedenaissance']."'>";
echo "<label>Date de recrutement</label>";
echo "<input type='date' name='datederecrutement' class='form-control' value='".$data['datederecrutement']."'>";
echo "<label>Fonction</label>";
echo "<input type='text' name='fonction' class='form-control' value='".$data['fonction']."'>";
echo "<label>Spécialité</label>";
echo "<input type='text' name='specialite' class='form-control' value='".$data['specialite']."'>";
echo "<label>Salaire net</label>";
echo "<input type='number' name='salairenet' class='form-control' value='".$data['salairenet']."'>";
echo "</div>";
echo "</div>";
echo "</fieldset>";
echo "<br><br><br><button type='submit' class='btn btn-primary'>";
echo "<i class='fas fa-save'></i> Enregistrer</button>";
echo "</form>";
echo "</div>";

?>
<script src="script.js"></script>
