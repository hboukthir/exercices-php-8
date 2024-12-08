<?php

// Définition de la fonction avec Union Types
function add(int|string $a, int|string $b): int|string {
    if (is_int($a) && is_int($b)) {
        return $a + $b; // Additionner si ce sont des entiers
    } elseif (is_string($a) && is_string($b)) {
        return $a . $b; // Concaténer si ce sont des chaînes
    } else {
        throw new TypeError("Les types des paramètres doivent être homogènes (soit tous entiers, soit toutes chaînes).");
    }
}

try {
    echo add(5, 3) . PHP_EOL; // Affiche 8 (addition des entiers)
    echo add("Hello ", "World") . PHP_EOL; // Affiche "Hello World" (concaténation des chaînes)
    echo add(5, "World") . PHP_EOL; // Génère une exception
} catch (TypeError $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}
