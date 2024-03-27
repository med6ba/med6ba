<?php
require("../head.php");
$active = 3;
require("../menu.php");
require("../connexion.php");

//La requête de jointure pour chercher les données de la table affecter
$r = "select employe.*, service.*, affecter.* 
from affecter, employe, service
where affecter.idemploye = employe.idemploye
and affecter.idservice = service.idservice";
$res = mysqli_query($con, $r);
$nbr_affecter = mysqli_num_rows($res);
?>

<!----------------------------------------------------------------->

<div class="container" style="margin-top: 100px;">
    <div class=entete-list>
        <h1 class="display-4">Liste des affectations</h1>
        <span class="nbr"><?php echo $nbr_affecter; ?></span>
    </div>
    <a href=affecter-form-add.php class='btn btn-success ttip' data-bs-toggle='tooltip' title='Ajouter un service'><i class='fa-solid fa-plus'></i></a>

<!--Bouton imprimer avec choix ------------------------------------->
<a href=# class='btn btn-secondary' data-bs-toggle='tooltip' title='Imprimer' onclick='afficherListe()'><i class="fa-solid fa-print"></i></a>
<div id="liste" style="display: none;">
  <ul>
    <li><a href="affecter-print.php?etat=1">Liste des affectations</a></li>
    <li><a href="#" onclick="afficheridEmploye()">Historique des affectations d'un employé</a></li>
    <li><a href="#" onclick="afficherIdService()">Liste des affectations d'un service</a></li>
  </ul>
</div>
<script>
function afficherListe() {
  var liste = document.getElementById('liste');
  if (liste.style.display === 'none') {
    liste.style.display = 'block';
  } else {
    liste.style.display = 'none';
  }
}
function afficheridEmploye() {
  var idEmploye = prompt("Entrez le ID de l'employé :");
  if (idEmploye != null && idEmploye != "") {
    window.location.href = "affecter-print.php?etat=2&idEmploye=" + encodeURIComponent(idEmploye);
  } 
}

function afficherIdService() {
  var idservice = prompt("Entrez le ID du service :");
  if (idservice != null && idservice != "") {
    window.location.href = "affecter-print.php?etat=3&idservice=" + encodeURIComponent(idservice);
  } 
}
</script>
<!-- Fin bouton Imprimer ----------------------------->

    <br>
    <br>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Id Employé</th>
                <th>Photo </th>
                <th>Nom </th>
                <th>Prénom </th>
                <th>Id Service </th>
                <th>Titre </th>
                <th>Date début </th>
                <th>Date fin </th>
                <th class="colm"></th>
            </tr>
        </thead>
        <tbody>
<?php

    while ($data = mysqli_fetch_assoc($res))
    {
$id= $data['idservice']."|".$data['idemploye']."|".$data['datedebut'];

echo "<tr>";
echo "<td>" . $data['idemploye'];
echo "<td><img src='../employe/images/" . $data['photo']. "' width=40>";
echo "<td>" . $data['nom'];
echo "<td>" . $data['prenom'];
echo "<td>" . $data['idservice'];
echo "<td>" . $data['nomservice'];
echo "<td>" . $data['datedebut'];
echo "<td>" . $data['datefin'];
echo "<td> <a href=affecter-form-update.php?id=".$id." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
echo " <a href=affecter-form-delete.php?id=".$id." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";
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
