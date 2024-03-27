<?php
require("../head.php");
$active = 2;
require("user-menu.php");
require("../connexion.php");

//La requête de jointure pour chercher les données de la table affecter
$r = "select employe.*, pointage.*
from pointage, employe
where pointage.idemploye = employe.idemploye
and pointage.idemploye = ". $idemploye . "
order by datepointage desc";
$res = mysqli_query($con, $r);
$nbr_pointage = mysqli_num_rows($res);
?>

<div class="container" style="margin-top: 100px;">
    <div class=entete-list>
        <h1 class="display-4">Mes pointages</h1>
        <span class="nbr"><?php echo $nbr_pointage; ?></span>
    </div>

    <br>
    <br>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Num</th>
                <th>Id employé </th>
                <th>Nom </th>
                <th>Prénom </th>
                <th>Titre </th>
                <th>Date </th>
                <th>Heure d'entrée </th>
                <th>Heure de sortie </th>
                <th>Heures travaillées </th>
                <th>Notes </th>
            </tr>
        </thead>
        <tbody>
<?php
$tht = 0; //$tht : total des heures travaillées
    while ($data = mysqli_fetch_assoc($res))
    {
$id= $data['idp'];

echo "<tr>";
echo "<td>" . $data['idp'];
echo "<td>" . $data['idemploye'];
echo "<td>" . $data['nom'];
echo "<td>" . $data['prenom'];
echo "<td>" . $data['nomservice'];
echo "<td>" . $data['datepointage'];
$heureEntree = $data['heuredentree'];
$heureSortie = $data['heuresortie'];
echo "<td>" . $heureEntree;
echo "<td>" . $heureSortie;
$heuresTravaillees = $heureSortie - $heureEntree; 
echo "<td>" . $heuresTravaillees . " H";
echo "<td>" . $data['notes'];
$tht+=$heuresTravaillees;
}
mysqli_close($con);

?>
        </tbody>
    </table>
    <hr>
    <center>
        <?php  echo "Total des heures travaillées : " . $tht. " H"; ?>
    </center>
</div>
    
<?php
    require("../footer.php");
?>
</body>
