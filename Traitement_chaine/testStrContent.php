<?php
$contents = file_get_contents('logfile.txt'); // Lire le contenu du fichier

if (str_contains($contents, 'erreur')) {
    echo "Le fichier contient le mot 'erreur'.";
} else {
    echo "Le mot 'erreur' n'a pas été trouvé dans le fichier.";
}
