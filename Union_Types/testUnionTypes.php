<?php

// Fonction qui retourne soit un tableau, soit une chaîne en fonction de l'argument.
function getResponse(bool $returnArray): array|string {
    if ($returnArray) {
        return ['message' => 'Success', 'status' => 200];
    }
    return "Success, status 200";
}

$response = getResponse(true); // Retourne un tableau
var_dump($response);

$response = getResponse(false); // Retourne une chaîne
echo $response;
