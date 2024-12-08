<?php
function add($a, $b) {
    // Vérification des types
    if (is_numeric($a) && is_numeric($b)) {
        return $a + $b;
    } elseif (is_string($a) && is_string($b)) {
        return $a . $b;
    } else {
        throw new InvalidArgumentException("Both arguments must be numeric or string.");
    }
}

echo add(5, 3); // Affiche 8
echo add("Hello ", "World"); // Affiche "Hello World"
