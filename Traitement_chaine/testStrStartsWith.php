<?php
$line = "Erreur dans le fichier de log";

if (str_starts_with($line, 'Erreur')) {
    echo "La ligne commence par 'Erreur'.";
} else {
    echo "La ligne ne commence pas par 'Erreur'.";
}
