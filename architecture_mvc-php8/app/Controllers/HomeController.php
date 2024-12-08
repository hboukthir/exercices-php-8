<?php

namespace App\Controllers;

use App\Core\Route;
use App\Core\View;

class HomeController {
    #[Route('GET', '/')]
    public function index() {
        View::render('home', [
            'title' => 'Accueil',
            'heading' => 'Bienvenue',
            'message' => 'Ceci est une page d\'accueil simple.'
        ]);
    }

    #[Route('GET', '/about')]
    public function about() {
        echo "À propos de nous.";
    }
}
