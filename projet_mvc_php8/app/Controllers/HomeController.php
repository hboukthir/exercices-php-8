<?php

namespace Controllers;
use Models\Article;
require_once '../app/Models/Article.php';
class HomeController
{
    public function index(): void {
        $articles = (new Article())->getAll();
        $this->view('home', ['articles' => $articles]);
    }

    public function about(): void {
        $this->view('about');
    }

    private function view(string $view, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/$view.php";
    }

}