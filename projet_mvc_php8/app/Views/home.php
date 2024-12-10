<h1>Liste des articles</h1>

<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <?= htmlspecialchars($article['name']) ?> - <?= htmlspecialchars($article['email']) ?>
            - <?= $article['id'] ?> <!-- Lien vers l'édition -->
        </li>
    <?php endforeach; ?>
</ul>