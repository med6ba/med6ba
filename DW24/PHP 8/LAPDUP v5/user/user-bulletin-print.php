<?php
session_start();
require('../fpdf/fpdf.php');
require("../connexion.php");

$idemploye = $_SESSION['idemploye'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
//Récupération des données saisies
$idemploye = $_GET['idemploye'];
$annee = $_GET['annee'];
$mois = $_GET['mois'];

$r = "select * from pointage where pointage.idemploye = ".$idemploye." and year(datepointage) = ".$annee." and month(datepointage) = ".$mois;
$res = mysqli_query($con, $r);

$nhtravaille = 0;
while ($data = mysqli_fetch_assoc($res))
{
    $ht = $data['heuresortie'] - $data['heuredentree'];
    $nhtravaille += $ht;
}
$r = "select * from pointage where pointage.idemploye = ".$idemploye." and year(datepointage) = ".$annee." and month(datepointage) = ".$mois;
$res = mysqli_query($con, $r);
$pdf = new FPDF();
$pdf->AliasNbPages(); 
$pdf->AddPage();

//Entête de la page
$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../images/lap2.png', 10, 10, 0, 5);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Bulletin de paie ', 0, 1, 'C');
$employe = $nom . " " . $prenom;

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, $employe, 0, 1, 'C');
$pdf->Ln(6);

//Entête du tableau
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255); 
$cellWidth = ($pdf->GetPageWidth()-20)/6 ;
$pdf->Cell($cellWidth, 8, utf8_decode('Année'), 0, 0, 'C', true);
$pdf->Cell($cellWidth, 8, 'Mois', 0, 0, 'C', true);
$pdf->Cell($cellWidth, 8, utf8_decode('Heure travaillées'), 0, 0, 'C', true);
$pdf->Ln();

//Contenu du tableau, impression des lignes de pointage
$pdf->SetFont('Arial', '', 10);
while ($data = mysqli_fetch_assoc($res)) 
{
    if ($fill) {
        $pdf->SetFillColor(240, 240, 240); 
    } else {
        $pdf->SetFillColor(255, 255, 255); 
    }
    $pdf->Cell($cellWidth, 8, $annee, 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth, 8, $mois, 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth, 8, $nhtravaille, 0, 0, 'C', $fill);
    $pdf->Ln();
    $fill = !$fill; 
}
//Numéro de page
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0,10, 'Page ' . $pdf->PageNo() . ' sur {nb}', 0, 0, 'L');
mysqli_close($con);
$pdf->Output();
?>
