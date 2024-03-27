<?php
require("../head.php");
$active = 4;
require("../menu.php");
require("../connexion.php");

//La requête de jointure pour chercher les données de la table affecter
$r = "select employe.*, pointage.*
from pointage, employe
where pointage.idemploye = employe.idemploye
order by datepointage desc";
$res = mysqli_query($con, $r);
$nbr_pointage = mysqli_num_rows($res);
?>

<div class="container" style="margin-top: 100px;">
    <div class=entete-list>
        <h1 class="display-4">Liste des pointages</h1>
        <span class="nbr"><?php echo $nbr_pointage; ?></span>
    </div>
    <a href=pointage-form-add.php class='btn btn-success ttip' data-bs-toggle='tooltip' title='Ajouter un pointage'><i class='fa-solid fa-plus'></i></a>

<!--Bouton imprimer avec choix -->
    <a href=# class='btn btn-secondary' data-bs-toggle='tooltip' title='Imprimer' onclick='afficherListe()'><i class="fa-solid fa-print"></i></a>
    <div id="liste" style="display: none;">
      <ul>
        <li><a href="pointage-print.php?etat=1">Liste des pointages entre 2 dates</a></li>
        <li><a href="#" onclick="lirelesdatesetprint()">Historique des pointages d'un employé entre 2 dates</a></li>
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
    function lirelesdatesetprint() {
  var ide = prompt("Entrez Le ID de l'employé :");
  var dd1 = prompt("Entrez la 1ère date de pointage :");
  var dd2 = prompt("Entrez la 2ème date de pointage :");
  if (dd1 != null && dd1 != "" && dd2 != null && dd2 != "") {
    window.location.href = "pointage-print.php?etat=2&dd1=" + encodeURIComponent(dd1) + "&dd2=" + encodeURIComponent(dd2)+ "&ide=" + encodeURIComponent(ide);
  } 
}
    </script>
<!-- Fin bouton Imprimer --->


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
                <th class="colm"></th>
            </tr>
        </thead>
        <tbody>
<?php

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
echo "<td>" . $heuresTravaillees;
echo "<td>" . $data['notes'];
echo "<td> <a href=pointage-form-update.php?id=".$id." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
echo " <a href=pointage-form-delete.php?id=".$id." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";
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
