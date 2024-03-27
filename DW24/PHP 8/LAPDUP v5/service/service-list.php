<?php
require("../head.php");
require("../connexion.php");
$r = "select * from service";
$res = mysqli_query($con, $r);
$nbr_service = mysqli_num_rows($res);
$active = 1;
require("../menu.php");
?>
<div class="container" style="margin-top: 100px;">
    <div class=entete-list>
        <h1 class="display-4">Liste des services</h1>
        <span class="nbr"><?php echo $nbr_service; ?></span>
    </div>

    <a href=service-form-add.php class='btn btn-success ttip' data-bs-toggle='tooltip' title='Ajouter un service'><i class='fa-solid fa-plus'></i></a>

    <a href=service-print.php class='btn btn-secondary' data-bs-toggle='tooltip' title='Imprimer tous les services'><i class="fa-solid fa-print"></i></a>

    <br>
    <br>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Id Service</th>
                <th>Nom </th>
                <th class="colm"></th>
            </tr>
        </thead>
        <tbody>
<?php

while ($data = mysqli_fetch_assoc($res))
{
$id= $data['idservice'];
echo "<tr>";
echo "<td>" . $data['idservice'];
echo "<td>" . $data['nomservice'];
echo "<td> <a href=service-form-update.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Modifier cette ligne'><i class='fa-solid fa-pencil'></i></a>";
echo " <a href=service-form-delete.php?id=".urlencode($id)." data-bs-toggle='tooltip' title='Supprimer cette ligne'><i class='fa-solid fa-trash-can iconrouge'></i></a>";
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
