<?php

namespace App\Controller;

use Twig\Environment;
use App\Core\Route;

class ArticleController {
    private Environment $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
        // Démarrer la session pour persister les articles
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Initialiser les articles si ce n'est pas déjà fait dans la session
        if (!isset($_SESSION['articles'])) {
            $_SESSION['articles'] = [];
        }
    }

    #[Route(method: 'GET', path: '/articles')]
    public function listArticles() {
        // Utiliser les articles stockés dans la session
        $articles = $_SESSION['articles'] ?? []; // On récupère les articles (ou un tableau vide si non définis)

        // Vérifiez si les articles existent et sont bien passés au template
        echo $this->twig->render('article.twig', ['articles' => $articles]);
    }


    #[Route('GET', '/articles/{id}')]
    public function getArticle(int $id) {
        // Vérifier si la session est démarrée et que les articles existent
        if (!isset($_SESSION['articles'])) {
            $_SESSION['articles'] = []; // Initialiser la liste d'articles si elle n'existe pas
        }

        // Récupérer les articles
        $articles = $_SESSION['articles'];

        // Vérifier si l'article avec l'ID existe
        if (isset($articles[$id])) {
            $article = $articles[$id];
            // Affichage via Twig
            echo $this->twig->render('article.twig', ['article' => $article]);
        } else {
            // Si l'article n'est pas trouvé, afficher une erreur
            header('HTTP/1.1 404 Not Found');
            echo $this->twig->render('error.twig', ['message' => 'Article not found']);
        }
    }


    #[Route('POST', '/articles')]
    public function createArticle() {
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['title'], $inputData['content'])) {
            // Récupérer les articles de la session
            $articles = $_SESSION['articles'];

            // Déterminer un nouvel ID
            $nextId = count($articles) > 0 ? max(array_column($articles, 'id')) + 1 : 1;

            // Créer un nouvel article
            $newArticle = [
                'id' => $nextId,
                'title' => $inputData['title'],
                'content' => $inputData['content']
            ];

            // Ajouter le nouvel article à la session
            $_SESSION['articles'][$nextId] = $newArticle;

            // Retourner l'article créé
            header('Content-Type: application/json');
            echo json_encode($newArticle);
        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Missing title or content']);
        }
    }

    #[Route('PUT', '/articles/{id}')]
    public function updateArticle(int $id) {
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($_SESSION['articles'][$id])) {
            $_SESSION['articles'][$id]['title'] = $inputData['title'] ?? $_SESSION['articles'][$id]['title'];
            $_SESSION['articles'][$id]['content'] = $inputData['content'] ?? $_SESSION['articles'][$id]['content'];

            header('Content-Type: application/json');
            echo json_encode($_SESSION['articles'][$id]);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Article not found']);
        }
    }

    #[Route('DELETE', '/articles/{id}')]
    public function deleteArticle(int $id) {
        if (isset($_SESSION['articles'][$id])) {
            unset($_SESSION['articles'][$id]);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Article deleted']);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Article not found']);
        }
    }

    #[Route('GET', '/articles/{id}/view')]
    public function viewArticle(int $id) {
        if (isset($_SESSION['articles'][$id])) {
            $article = $_SESSION['articles'][$id];
            echo $this->twig->render('article.twig', ['article' => $article]);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Article not found']);
        }
    }
}
