<?php
$filename = "logfile.txt";

if (str_ends_with($filename, '.txt')) {
    echo "Le fichier est un fichier texte.";
} else {
    echo "Le fichier n'est pas un fichier texte.";
}
