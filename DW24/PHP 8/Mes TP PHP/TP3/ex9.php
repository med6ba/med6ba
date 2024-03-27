<?php
    require("head.php");
    require("menu.php");
?>
<div class="container mt-8rem">
    <form method="POST">
        <h1 class=display-4><b>Simulateur des crédits</b></h1>
        <br>
        Nom et prénom:
        <input type="text" name="nomprénom" class="form-control">
        <br>
        Montant et créditer:
        <input type="number" name="montantcredit" class="form-control">
        <br>
        Nombre de mois de versement du crédit:
        <select name="nombre_mois" class="form-control">
            <?php
                for ($i = 6;  $i<=36; $i += 6)
                echo "<option>$i</option>";
            ?>
        </select>
        <br>
        Taux d’intérêt en %:
        <input type="number" name="taux" class="form-control" min=10 max=50 step="5">
        <br>
        <br>
        <input type="submit" value="Afficher" class="btn btn-primary">
    </form>
    
<?php
    extract($_POST);
    if(isset($nomprénom))
    {
        echo "<br>";
        echo "<div class='alert alert-info'>";
        echo "Nom et prénom: <b>" .$nomprénom;
        echo "</b> <br> Montant de crédits: <b>" .$montantcredit. " DH" ;
        echo "</b> <br> Nombre de mois: <b>" .$nombre_mois. " mois" ;
        echo "</b> <br> Taux d’intérêt: <b>" .$taux. " % </b>" ;
        echo "</div>";

        echo "<br>";
        echo "<h1 class=display-4><b>Tableau des versements</b></h1>";  
        echo "<br>";
        echo "<table class='table table-striped table-hover table-responsive'><th>Mois<th>A verser<th>Reste a verser";
        $total_a_verser = $montantcredit + ($montantcredit * $taux/100);
        //mav: montant a verser
        $mav = $total_a_verser / $nombre_mois;
        //rav: reste a verser
        $rav = $total_a_verser - $mav;
        for($i=1; $i<=$nombre_mois; $i++)
        {
        echo "<tr>";
        echo "<td>$i";
        echo "<td>".number_format($mav,2). " DH";
        echo "<td>".number_format($rav,2)." DH";
        $rav = $rav - $mav;
        }
        echo "</table>";
    }

?>

</div>