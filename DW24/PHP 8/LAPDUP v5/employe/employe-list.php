<?php 
require("../head.php");
$active = 2;
require("../menu.php");
require('../connexion.php');
$r = 'select * from employe';
$res = mysqli_query($con, $r);
$nbr_service = mysqli_num_rows($res);
?>
<div class="container" style="margin-top: 100px;">
<div class=entete-list>
    <h1 class='display-4'>Liste des employés</h1>
    <span class='nbr'><?php echo $nbr_service; ?></span>
</div>
<a href=employe-form-add.php class='btn btn-success ttip' data-bs-toggle='tooltip' title='Ajouter un employe'><i class='fa-solid fa-plus'></i></a>
<a href=employe-print.php class='btn btn-secondary' data-bs-toggle='tooltip' title='Imprimer tous les employes'><i class='fa-solid fa-print'></i></a>
<br><br>

<div class='table-container' style='overflow-x: auto;'>
<table id='example' class='table table-striped'>
    <thead>
        <tr><th>Idemploye</th><th>Photo</th><th>Ncin</th><th>Nom</th><th>Prenom</th><th>Adresse</th><th>Tel</th><th>Email</th><th>Datedenaissance</th><th>Datederecrutement</th><th>Fonction</th><th>Specialite</th><th>Salairenet</th><th>Motdepasse</th><th class='colm'></th>
        </tr>
    </thead><tbody>
<?php
while ($data = mysqli_fetch_assoc($res))
{
$id = $data[idemploye];
echo "<tr>";
echo "<td>".$data['idemploye']."</td>";
echo "<td><img src='images/".$data['photo']."' style='width:30'></td>";
echo "<td>".$data['ncin']."</td>";
echo "<td>".$data['nom']."</td>";
echo "<td>".$data['prenom']."</td>";
echo "<td>".$data['adresse']."</td>";
echo "<td>".$data['tel']."</td>";
echo "<td>".$data['email']."</td>";
echo "<td>".$data['datedenaissance']."</td>";
echo "<td>".$data['datederecrutement']."</td>";
echo "<td>".$data['fonction']."</td>";
echo "<td>".$data['specialite']."</td>";
echo "<td>".$data['salairenet']."</td>";
echo "<td>".$data['motdepasse']."</td>";
echo "<td> <a href='employe-form-update.php?id=".$id."' data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
echo "<a href='employe-form-delete.php?id=".$id."' data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";
}
echo "
</tbody>
</table>
</div></div>";
mysqli_close($con);
require("../footer.php");
?>
