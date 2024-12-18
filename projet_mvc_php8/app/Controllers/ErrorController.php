<?php

namespace Controllers;

class ErrorController
{
    public function notFound(): void {
        $this->view('error');
    }

    private function view(string $view, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/$view.php";
    }
}