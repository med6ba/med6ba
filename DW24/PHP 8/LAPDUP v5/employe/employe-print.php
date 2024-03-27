<?php 
// Inclusion de la bibliothèque FPDF
require('../fpdf/fpdf.php');
require('../connexion.php');

// Requête SQL pour sélectionner tous les employés
$r = 'select * from employe';
$res = mysqli_query($con, $r);

// Définition d'une classe PDF personnalisée
class PDF extends FPDF
{
    // Méthode pour définir le pied de page
    function Footer()
    {
        // Déplace le pointeur Y de 15 unités vers le haut par rapport à la position actuelle.
        $this->SetY(-15);

        // Définit la police Arial en italique avec une taille de 8.
        $this->SetFont('Arial', 'I', 8);

        // Affiche le numéro de la page actuelle et le nombre total de pages au format 'Page X sur Y' à droite de la page.
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' sur {nb}', 0, 0, 'R');
    }
}

// Instanciation de la classe PDF
$pdf = new PDF();

// Définition d'un alias pour le nombre total de pages
$pdf->AliasNbPages();

// Ajout d'une page en mode paysage
$pdf->AddPage('L');

// Définition de la police, du style et de la taille de la police
$pdf->SetFont('Arial', 'B', 16);

// Insertion d'une image
$pdf->Image('../images/lap2.png', 10, 10, 0, 5);

// Saut de ligne
$pdf->Ln(10);

// Affichage d'un titre centré
$pdf->Cell(0, 10, utf8_decode('Liste des employés'), 0, 1, 'C');

// Saut de ligne
$pdf->Ln(6);

// Définition de la police, du style et de la taille de la police
$pdf->SetFont('Arial', 'B', 12);

// Définition de la couleur de fond des cellules
$pdf->SetFillColor(200, 220, 255); 

// Calcul de la largeur des cellules en fonction de la largeur de la page
$cellWidth = ($pdf->GetPageWidth()-20) / 14;

// Réinitialisation de la police à la normale
$pdf->SetFont('Arial', '', 12);

// Boucle sur les données des employés
while ($data = mysqli_fetch_assoc($res))
{

// Affichage des données
$cellWidth = ($pdf->GetPageWidth()-20); // Calcul de la largeur de la cellule en fonction de la largeur de la page PDF

$pdf->Cell(50, 8, 'ID', 0); // Affichage du texte 'ID' dans une cellule de largeur 50 et hauteur 8

$pdf->Cell($cellWidth, 8, $data['idemploye'], 0); // Affichage de la valeur de $data['idemploye'] dans une cellule de largeur calculée précédemment et hauteur 8

$pdf->SetX(160); // Placer le curseur à une position X spécifique
$pdf->Cell(50, 8, 'Date de naissance', 0);
$pdf->Cell($cellWidth, 8, $data['datedenaissance'], 0);

$pdf->Ln();$pdf->Cell(50, 8, 'Photo', 0);
$photo = 'images/' . $data['photo'];

// Insère une image dans le document PDF à partir du chemin $photo.
// Déplace l'image vers la droite en ajoutant un décalage de 5 unités à la position actuelle de l'axe X du curseur de dessin.
// Déplace l'image vers le haut en soustrayant 7 unités à la position actuelle de l'axe Y du curseur de dessin.
// Définit la largeur et la hauteur de l'image à 15 unités chacune.
$pdf->Image($photo, $pdf->GetX() + 5, $pdf->GetY() - 7, 15, 15);

$pdf->SetX(160);
$pdf->Cell(50, 8, 'Date de recrutement', 0);
$pdf->Cell($cellWidth, 8, $data['datederecrutement'], 0);

$pdf->Ln();$pdf->Cell(50, 8, 'NCIN', 0);
$pdf->Cell($cellWidth, 8, $data['ncin'], 0);

$pdf->SetX(160);$pdf->Cell(50, 8, 'Fonction', 0);
$pdf->Cell($cellWidth, 8, $data['fonction'], 0);

$pdf->Ln();$pdf->Cell(50, 8, utf8_decode('Nom et prénom'), 0);
$pdf->SetFont('Arial', 'B', 12);$pdf->Cell($cellWidth, 8, strtoupper($data['nom']) . ' ' . ucfirst(strtolower($data['prenom'])), 0);
$pdf->SetFont('Arial', '', 12); // Réinitialisation de la police à normale

$pdf->SetX(160);$pdf->Cell(50, 8, utf8_decode('Spécialité'), 0);
$pdf->Cell($cellWidth, 8, $data['specialite'], 0);

$pdf->Ln();$pdf->Cell(50, 8, 'Adresse', 0);
$pdf->Cell($cellWidth, 8, $data['adresse'], 0);

$pdf->SetX(160);$pdf->Cell(50, 8, 'Salaire net', 0);
$pdf->Cell($cellWidth, 8, number_format($data['salairenet'],2) . ' DH', 0);

$pdf->Ln();$pdf->Cell(50, 8, utf8_decode('Tél'), 0);
$pdf->Cell($cellWidth, 8, FormatTel($data['tel']), 0);

$pdf->SetX(160);$pdf->Cell(50, 8, 'Mot de passe', 0);
$pdf->Cell($cellWidth, 8, '*****', 0);

$pdf->Ln();$pdf->Cell(50, 8, 'Email', 0);
$pdf->Cell($cellWidth, 8, $data['email'], 0);
// Définit l'épaisseur de la ligne à 0.1 unité.
$pdf->SetLineWidth(0.1);

// Définit la couleur de dessin à RVB (200, 200, 200), correspondant à un gris clair.
$pdf->SetDrawColor(200, 200, 200);

// Déplace le curseur à la ligne suivante.
$pdf->Ln();

// Dessine une ligne horizontale de l'abscisse 10 à l'abscisse (largeur de page - 10) à l'ordonnée actuelle du curseur.
$pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
}
mysqli_close($con);
// Génère la sortie du document PDF vers la sortie standard (généralement le navigateur).
$pdf->Output();

function FormatTel($phoneNumber) {
    // Supprime tout ce qui n'est pas un chiffre
    $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
    
    // Formate le numéro avec des espaces
    return preg_replace('/(\d{2})(?=\d)/', '$1-', $phoneNumber);
}
?>
