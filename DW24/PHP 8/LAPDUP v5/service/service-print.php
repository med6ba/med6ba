<?php
session_start();
/* Vérifier si cette page est authentifié */
    $v_session = $_SESSION['v_session'];
    if ($v_session != 1) 
    {
    echo "<!-- Bootstrap version 5.3.0 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css'>";
    echo "<meta charset=utf-8>";

    echo "<div class='alert alert-danger'><i class='fa-solid fa-triangle-exclamation'></i> <b>LaPduP</b> : Echec de connexion... | Vous n'avez pas le droit d'accéder à cette page sans authentification...</div>";
    exit();
}
else
{
// Inclure la bibliothèque FPDF
require('../fpdf/fpdf.php');

require("../connexion.php");

// Récupérer les données de la table "service"
$r = "SELECT * FROM service";
$res = mysqli_query($con, $r);

// Créer un objet FPDF
$pdf = new FPDF();
$pdf->AliasNbPages(); // Ajouter cette ligne pour définir l'alias
$pdf->AddPage();

// Définir la police
$pdf->SetFont('Arial', 'B', 16);

// Ajouter une image en haut de la page
$pdf->Image('../images/lap2.png', 10, 10, 0, 5);
$pdf->Ln(10);

// Titre
$pdf->Cell(0, 10, 'Liste des services', 0, 1, 'C');
$pdf->Ln(6);

// Entête du tableau
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); // Couleur de fond de l'en-tête

// Utilisez la largeur de la page comme largeur de cellule
$cellWidth = ($pdf->GetPageWidth()-20) / 4;

$pdf->Cell($cellWidth, 10, 'ID Service', 1, 0, 'C', true);
$pdf->Cell($cellWidth*3, 10, 'Nom du Service', 1, 0, 'C', true);
$pdf->Ln();

// Afficher les données de la table
$pdf->SetFont('Arial', '', 12);
while ($data = mysqli_fetch_assoc($res)) {
    $pdf->Cell($cellWidth, 10, $data['idservice'], 1);
    $pdf->Cell($cellWidth*3, 10, $data['nomservice'], 1);
    $pdf->Ln();
}

// Numéro de page
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0,10, 'Page ' . $pdf->PageNo() . ' sur {nb}', 0, 0, 'L');


// Fermer la connexion à la base de données
mysqli_close($con);

// Afficher le PDF dans le navigateur
$pdf->Output();
}
?>
