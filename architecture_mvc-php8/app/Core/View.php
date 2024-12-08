<?php
namespace App\Core;

class View {
    public static function render(string $view, array $data = []) {
        extract($data);
        require __DIR__ . '/../Views/' . $view . '.php';
    }
}
