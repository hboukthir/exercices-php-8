<?php
$filename = 'logfile.txt';
$contents = file_get_contents($filename); // Lire tout le contenu du fichier

// Vérifier si le fichier contient un message d'erreur
if (str_contains($contents, 'erreur')) {
    echo "Le fichier contient des erreurs.\n";
}

// Parcourir chaque ligne et vérifier si elle commence par 'Erreur'
$lines = explode("\n", $contents); // Séparer les lignes du fichier
foreach ($lines as $line) {
    if (str_starts_with($line, 'Erreur')) {
        echo "Ligne d'erreur trouvée : " . $line . "\n";
    }
}

// Vérifier si le fichier se termine par '.txt'
if (str_ends_with($filename, '.txt')) {
    echo "Le fichier est un fichier texte.\n";
} else {
    echo "Le fichier n'est pas un fichier texte.\n";
}
