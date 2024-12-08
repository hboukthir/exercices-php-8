<?php
// Chargement du fichier HTML
$html = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Exemple</title>
</head>
<body>
    <h1>Bienvenue sur ma page!</h1>
    <p>Voici un exemple de page HTML avec des balises à manipuler.</p>
    <a href="https://www.example.com" class="external">Lien externe</a>
    <a href="https://www.test.com" class="external">Test Link</a>
</body>
</html>
HTML;
global $dom;
// Créer une instance de DOMDocument et charger le contenu HTML
$dom = new DOMDocument();

// Pour éviter les erreurs liées aux entités HTML (par exemple, &amp; devient &), on ignore les erreurs
libxml_use_internal_errors(true);

// Charger le contenu HTML dans l'objet DOM
$dom->loadHTML($html);
libxml_clear_errors();

// Afficher l'arbre DOM sous forme de chaîne
echo "Document original : \n";
echo $dom->saveHTML();

// Extraire le premier élément <h1>

$h1 = $dom->getElementsByTagName('h1')->item(0);

// Modifier le texte du <h1>
$h1->nodeValue = "Page modifiée avec PHP !";

// Afficher le document modifié
echo "Document modifié : \n";
echo $dom->saveHTML();

// Extraire tous les éléments <a>
global $dom;
$links = $dom->getElementsByTagName('a');

// Parcourir les liens et supprimer ceux avec la classe 'external'
foreach ($links as $link) {
    if ($link->getAttribute('class') == 'external') {
        $link->parentNode->removeChild($link);
    }
}

// Afficher le document après la suppression des liens externes
echo "Document après suppression des liens externes : \n";
echo $dom->saveHTML();

// Extraire tous les éléments <a> du document
global $dom;
$links = $dom->getElementsByTagName('a');

// Afficher tous les liens extraits
foreach ($links as $link) {
    echo "Lien : " . $link->getAttribute('href') . "\n";
}

// Créer une nouvelle balise <div>
global $dom;
$newDiv = $dom->createElement('div', 'Ceci est un nouveau bloc div ajouté dynamiquement.');

// Ajouter la balise <div> avant la balise <h1>
$body = $dom->getElementsByTagName('body')->item(0);
$body->insertBefore($newDiv, $body->firstChild);

// Afficher le document avec la nouvelle balise
echo "Document avec ajout de <div> : \n";
echo $dom->saveHTML();

