<?php

class UserController {

    #[Route('GET', '/users')]
    public function getUsers(): void
    {
        $users = User::getAllUsers();

        header('Content-Type: application/json');
        echo json_encode($users);
    }

    #[Route('GET', '/users/{id}')]
    public function getUserById(int $id): void
    {
        // Récupérer un utilisateur par son ID
        $user = User::getUserById($id);

        if ($user) {
            header('Content-Type: application/json');
            echo json_encode([
                'id' => $user->getId(),
                'name' => $user->getName()
            ]);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'User not found']);
        }
    }

    #[Route('POST', '/users')]
    public function createUser(): void
    {
        // Récupérer les données envoyées en POST
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['name'])) {
            $newUser = User::createUser($inputData['name']);

            header('Content-Type: application/json');
            echo json_encode([
                'id' => $newUser->getId(),
                'name' => $newUser->getName()
            ]);
        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Name is required']);
        }
    }

    #[Route('PUT', '/users/{id}')]
    public function updateUser(int $id): void
    {
        // Récupérer les données envoyées en PUT
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['name'])) {
            $updated = User::updateUser($id, $inputData['name']);

            if ($updated) {
                header('Content-Type: application/json');
                echo json_encode([
                    'id' => $id,
                    'name' => $inputData['name']
                ]);
            } else {
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(['error' => 'Failed to update user']);
            }
        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Name is required']);
        }
    }

    #[Route('DELETE', '/users/{id}')]
    public function deleteUser(int $id): void
    {
        $deleted = User::deleteUser($id);

        if ($deleted) {
            header('Content-Type: application/json');
            echo json_encode(['message' => "User $id has been deleted"]);
        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Failed to delete user']);
        }
    }
}
