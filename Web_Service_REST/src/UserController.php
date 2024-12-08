<?php

namespace app;

class UserController
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $id = $path[1] ?? null;

        header('Content-Type: application/json');

        try {
            switch ($method) {
                case 'GET':
                    if ($id) {
                        echo json_encode($this->user->getById((int)$id));
                    } else {
                        echo json_encode($this->user->getAll());
                    }
                    break;

                case 'POST':
                    $data = json_decode(file_get_contents('php://input'), true);
                    $this->user->create($data['name'], $data['email']);
                    echo json_encode(['message' => 'User created']);
                    break;

                case 'PUT':
                    $data = json_decode(file_get_contents('php://input'), true);
                    $this->user->update((int)$id, $data['name'], $data['email']);
                    echo json_encode(['message' => 'User updated']);
                    break;

                case 'DELETE':
                    $this->user->delete((int)$id);
                    echo json_encode(['message' => 'User deleted']);
                    break;

                default:
                    http_response_code(405);
                    echo json_encode(['error' => 'Method Not Allowed']);
                    break;
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
