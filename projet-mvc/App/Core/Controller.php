<?php
namespace App\Core;

class Controller {
    public function render($view, $params = []) {
        extract($params);  // Extraire les paramètres pour pouvoir les utiliser dans la vue
        ob_start();  // Commencer la capture de la sortie
        require __DIR__ . "/../Views/$view.php";  // Charger la vue
        $content = ob_get_clean();  // Obtenir le contenu capturé
        echo $content;  // Afficher le contenu de la vue
    }
}
