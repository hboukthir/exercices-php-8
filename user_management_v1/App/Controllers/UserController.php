<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $users = User::all();
        $this->render('user/index', ['users' => $users]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::create($_POST);
            header('Location: /user');
            exit;
        }
        $this->render('user/create');
    }

    public function edit($id) {
        $user = User::find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::update($id, $_POST);
            header('Location: /user');
            exit;
        }
        $this->render('user/edit', ['user' => $user]);
    }
}
