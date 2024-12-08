<?php
// Inclusion du fichier Person.php
require_once 'Person.php';

// Création d'une instance de la classe Person
$person = new Person("John", "Doe", 30);

// Affichage de l'objet comme chaîne (automatique via __toString)
echo "Person Info: " . $person . PHP_EOL;

// Vous pouvez également manipuler l'objet comme une chaîne dans une variable
$personInfo = (string)$person;
echo "Person Info (as string): $personInfo" . PHP_EOL;
