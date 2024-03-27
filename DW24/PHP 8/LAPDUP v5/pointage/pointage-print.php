<?php
require('../fpdf/fpdf.php');
require("../connexion.php");
extract($_POST);
$etat = $_GET['etat'];

//Si la 1ère option de imprimer est choisie
if ($etat == 1) {
    $r = "select employe.*, pointage.*
from pointage, employe
where pointage.idemploye = employe.idemploye
order by datepointage desc";
} 

//Si la 2ème option de imprimer est choisie
if ($etat == 2) {

    //Récupération des données saisies
    $dd1 = $_GET['dd1'];
    $dd2 = $_GET['dd2'];
    $ide = $_GET['ide'];

    //Recherche des données de pointage
    $r = "select employe.*, pointage.*
from pointage, employe
where pointage.idemploye = employe.idemploye
and pointage.idemploye = ".$ide. " and datepointage between '". $dd1 . "' and '" . $dd2 . "'"; 

    //Recherche du nom et prénom de l'employé sélectionné
    $r_employe = "select * from employe where idemploye = " . $ide;
    $res_employe = mysqli_query($con, $r_employe);
    $data_employe = mysqli_fetch_assoc($res_employe);
    
    // La valeur de $employe est imprimée juste après le titre de l'état
    $employe = $data_employe['nom'] . " " . $data_employe['prenom'];

}
//Exécution de la requête
$res = mysqli_query($con, $r);

$pdf = new FPDF();
$pdf->AliasNbPages(); 
$pdf->AddPage();

//Entête de la page
$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../images/lap2.png', 10, 10, 0, 5);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Liste des pointages ', 0, 1, 'C');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, $employe, 0, 1, 'C');
$pdf->Ln(6);

//Entête du tableau
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255); 
$cellWidth = ($pdf->GetPageWidth()-20)/6 ;
$pdf->Cell($cellWidth, 8, 'Date ', 0, 0, 'C', true);
$pdf->Cell($cellWidth, 8, utf8_decode('Heure d entrée'), 0, 0, 'C', true);
$pdf->Cell($cellWidth, 8, 'Heure de sortie', 0, 0, 'C', true);
$pdf->Cell($cellWidth, 8, utf8_decode('Heures travaillées'), 0, 0, 'C', true);
$pdf->Cell($cellWidth*2, 8, utf8_decode('Notes'), 0, 0, 'C', true);
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
    $pdf->Cell($cellWidth, 8, $data['datepointage'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth, 8, $data['heuredentree'], 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth, 8, $data['heuresortie'], 0, 0, 'C', $fill);
    $heuretravaillees = $data['heuresortie'] - $data['heuredentree'];
    $heuretravaillees .= " H";
    $pdf->Cell($cellWidth, 8, $heuretravaillees, 0, 0, 'C', $fill);
    $pdf->Cell($cellWidth*2, 8, $data['notes'], 0, 0, 'C', $fill);
    $pdf->Ln();
    $fill = !$fill; 
}
//Numéro de page
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0,10, 'Page ' . $pdf->PageNo() . ' sur {nb}', 0, 0, 'L');
mysqli_close($con);
$pdf->Output();
?>
