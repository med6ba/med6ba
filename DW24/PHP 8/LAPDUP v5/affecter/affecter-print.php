<?php
require('../fpdf/fpdf.php');
require("../connexion.php");
extract($_POST);
$etat = $_GET['etat'];
if ($etat == 1) {
    $r = "select employe.*, service.*, affecter.* from affecter, employe, service where affecter.idemploye = employe.idemploye and affecter.idservice = service.idservice";
} 
if ($etat == 2) {
    $idemploye = $_GET['idEmploye'];
   $r = "select employe.*, service.*, affecter.* from affecter, employe, service where affecter.idemploye = employe.idemploye and affecter.idservice = service.idservice
   and affecter.idemploye = ".$idemploye;
}
if ($etat == 3) {
    $idservice = $_GET['idservice'];
   $r = "select employe.*, service.*, affecter.* from affecter, employe, service where affecter.idemploye = employe.idemploye and affecter.idservice = service.idservice
   and affecter.idservice = '".$idservice."'";
}


$res = mysqli_query($con, $r);

$pdf = new FPDF();
$pdf->AliasNbPages(); 
$pdf->AddPage('L');

$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../images/lap2.png', 10, 10, 0, 5);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Liste des affectations', 0, 1, 'C');
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); // Couleur de fond de l'en-tête (blue claire)

$cellWidth = ($pdf->GetPageWidth()-20)/6 ;
$pdf->Cell($cellWidth-30, 8, 'IDE', 0, 0, 'C', true);
$pdf->Cell($cellWidth+10, 8, 'Nom', 0, 0, 'C', true);
$pdf->Cell($cellWidth+10, 8, utf8_decode('Prénom'), 0, 0, 'C', true);
$pdf->Cell($cellWidth*2, 8, 'Service', 0, 0, 'C', true);
$pdf->Cell($cellWidth-20, 8, utf8_decode('Date début'), 0, 0, 'C', true);
$pdf->Cell($cellWidth-20, 8, utf8_decode('Date fin'), 0, 0, 'C', true);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
while ($data = mysqli_fetch_assoc($res)) 
{
        // Alterner la couleur de fond des lignes
    if ($fill) {
        $pdf->SetFillColor(240, 240, 240); // Couleur de fond pour lignes alternatives (gris clair)
    } else {
        $pdf->SetFillColor(255, 255, 255); // Couleur de fond pour lignes non alternatives (blanc)
    }
    $pdf->Cell($cellWidth-30, 8, $data['idemploye'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth+10, 8, $data['nom'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth+10, 8, $data['prenom'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth*2, 8, $data['nomservice'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth-20, 8, $data['datedebut'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth-20, 8, $data['datefin'], 0, 0, 'C', $fill);
    $pdf->Ln();
    $fill = !$fill; // Inverser la couleur de fond pour la prochaine ligne
}

// Numéro de page
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0,10, 'Page ' . $pdf->PageNo() . ' sur {nb}', 0, 0, 'L');


// Fermer la connexion à la base de données
mysqli_close($con);

// Afficher le PDF dans le navigateur
$pdf->Output();

?>
