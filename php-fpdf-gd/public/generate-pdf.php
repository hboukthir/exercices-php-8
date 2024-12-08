<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ImageGenerator;


// Créer une instance de ImageGenerator
$imageGenerator = new ImageGenerator();

// Générer une image dynamique
$imagePath = $imageGenerator->generateImage();

// Créer un document PDF
$pdf = new FPDF();
$pdf->AddPage();

// Ajouter un titre
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(200, 10, 'Rapport avec Image Dynamique', 0, 1, 'C');

// Ajouter une image générée
$pdf->Image($imagePath, 50, 50, 100);

// Ajouter plus de contenu au PDF
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(85);
$pdf->MultiCell(0, 10, 'Voici une image generee dynamiquement avec la bibliotheque GD, et ajoutee à un fichier PDF cree avec FPDF.');

$pdf->Output('F', 'generated_report.pdf');
