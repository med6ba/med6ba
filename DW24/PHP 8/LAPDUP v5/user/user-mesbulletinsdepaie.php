<?php
require("../head.php");
$active = 2;
require("user-menu.php");
require("../connexion.php");

//La requête de jointure pour chercher les données de la table affecter
$r = "SELECT idemploye, YEAR( datepointage ) AS annee, MONTH( datepointage ) as mois
FROM pointage
where idemploye = " . $idemploye. "
GROUP BY idemploye ";
$res = mysqli_query($con, $r);
$nbr_pointage = mysqli_num_rows($res);
?>

<div class="container" style="margin-top: 100px;">
    <div class=entete-list>
        <h1 class="display-4">Mes bulletins de paie</h1>
        <span class="nbr"><?php echo $nbr_pointage; ?></span>
    </div>

    <br>
    <br>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Num</th>
                <th>Année </th>
                <th>Mois </th>
                <th>Imprimer </th>
                
            </tr>
        </thead>
        <tbody>
<?php
$i=1;
    while ($data = mysqli_fetch_assoc($res))
    {
$id= $data['idp'];

echo "<tr>";
echo "<td>" . $i;
echo "<td>" . $data['annee'];
echo "<td>" . $data['mois'];
echo "<td><a href=user-bulletin-print.php?idemploye=".$idemploye."&annee=".$data['annee']."&mois=".$data['mois'].">Imprimer</a>";
$i++;
}
mysqli_close($con);
?>
        </tbody>
    </table>
</div>
    
<?php
    require("../footer.php");
?>
</body>
