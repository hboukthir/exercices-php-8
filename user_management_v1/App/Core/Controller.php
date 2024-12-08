<?php
namespace App\Core;

class Controller {
    public function render($view, $params = []) {
        extract($params); // Extraire les variables dans le scope
        ob_start();
        include __DIR__ . "/../Views/$view.php"; // Inclure la vue
        $content = ob_get_clean();
        echo $content; // Afficher la vue
    }
}
