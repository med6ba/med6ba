<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<div class="container">
<?php
    echo "<h1 class='display-4'>Mini Facture</h1>";
    $nom_produit = "PC portable HP i7";
    $prix = 5500;
    $qte = 3;
    $mht = $prix * $qte;
    $mtva = $mht * 20/100;
    $mttc = $mht + $mtva;
    echo "Nom du produit: $nom_produit";
    echo "<br> Prix hors taxe : $prix DH";
    echo "<br> Quantité : $qte";
    echo "<br> Montant hors taxe : $mht DH";
    echo "<br>Montant TVA : $mtva DH";
    echo "<div class='alert alert-danger'>Montant TTC : $mttc DH</div>";
?>
</div>