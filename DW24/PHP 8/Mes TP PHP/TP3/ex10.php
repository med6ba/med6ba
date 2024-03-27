<?php
    require("head.php");
    require("menu.php");
?>
<div class="container mt-8rem">
    <form method="POST">
        <label class="form-label"> Nom et prénom:</label>
        <input type="text" name="nom_prenom" class="form-control">

        Le n de compte CNSS:
        <input type="text" name="num_compte" class="form-control">

        Salaire de base:
        <input type="number" name="salaire_de_base" class="form-control">

        Date de recrutement:
        <input type="date" name="date_de_recrutement" class="form-control">

        <br>
        <input type="submit" value="Afficher" class="btn btn-primary">
    </form>
    <?php
    extract($_POST);
    if (isset($nom_prenom))
    {
        echo "<h1 class=display-4><b><center>ETAT DES COTISATIONS</center></b></h1>";
        echo "<br>";
        echo "<div class='alert alert-primary'>";
        echo "<div class='container'>";
        echo "Nom et prénom : <b>" . $nom_prenom;
        echo "</b><br>Numéro de compte : <b>" . $num_compte;
        echo "</b><br>Salaire de base : <b>" . $salaire_de_base . " DH";
        echo "</b><br>Date de recrutement : <b>" . $date_de_recrutement;
        echo "<br>";
        echo "<br>";
        echo "<table class='table table-striped table-hover table-responsive'>
        <th>Année <th>Mois <th> Salaire de base <th>AMO 
        <th>CNSS <th>TP <th>TOTAL";
        
        $annee_recrutement = date("Y", strtotime($date_de_recrutement)); 
        $annee_courante = date("Y"); 
        $nbr_annee_travaille = $annee_courante - $annee_recrutement;  
        $nbr_annee_travaille++; 
        $nbr_mois_travaille = $nbr_annee_travaille * 12; 
        $mois_courant = date("m"); 
        $mois_recrutement = date("m", $date_de_recrutement);
        $nbr_mois_travaille -=  12-$mois_courant;
    
    
        $annee = date("Y", strtotime($date_de_recrutement));
        $mois = date("m", strtotime($date_de_recrutement));
        for ($i=1; $i<=$nbr_mois_travaille; $i++)
        {
            if ($annee == $annee_courante && $mois == $mois_courant) $i=$nbr_mois_travaille;
    
            echo "<tr>";
            echo "<td>" . $annee;
            echo "<td>" . $mois;
            echo "<td>" . $salaire_de_base . " DH";
            $amo = $salaire_de_base * 6.37/100;
            echo "<td>" . $amo . " DH";
            $cnss = $salaire_de_base * 19.86/100; 
            echo "<td>" . $cnss . " DH";
            $tp = $salaire_de_base * 1.60/100; 
            echo "<td>" . $tp . " DH";
            $total = $amo + $cnss + $tp;
            echo "<td>" . $total . " DH";
            $total_amo += $amo;
            $total_cnss += $cnss;
            $total_tp += $tp;
            $total_total += $total;
            $mois++;
            if ($mois >= 13) {$mois = 1; $annee++;}
        }
        echo "<tr><td><td><td>";
        echo "<td>$total_amo DH<td>$total_cnss DH<td>$total_tp DH<td>$total_total DH";
        echo "</div>";
    }
    ?>
</div>