<?php
namespace App\Controllers;

use App\Core\Controller;  // Ajouter cette ligne pour importer la classe Controller
use App\Models\User;

class UserController extends Controller {
    public function index(): void
    {
        $users = User::all();
        $this->render('user/index', ['users' => $users]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::create($_POST);
            header('Location: /user');
            exit;
        }
        $this->render('user/create');
    }

    public function edit($id): void
    {
        $user = User::find($id);
        if (!$user) {
            http_response_code(404);
            die("Utilisateur introuvable");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::update($id, $_POST);
            header('Location: /user');
            exit;
        }

        $this->render('user/edit', ['user' => $user]);
    }
}
