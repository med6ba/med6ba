<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="container">
<meta charset="UTF-8">
<form method="POST">
    <br>
    <label for="lignes">Nombre de lignes :</label>
    <input type="number" name="lignes" required><br>
    <br>
    <label for="col">Nombre de colonnes :</label>
    <input type="number" name="col" required><br>
    <br>
    <input type="submit" value="Générer" class="btn btn-primary">
</form>
<?php
extract($_POST);
if (isset($col))
{
    echo "<table border=1 class='table table-responsive'>";
    for ($i = 0; $i < $lignes; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td>Colonne</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
</div>