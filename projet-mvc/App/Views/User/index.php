<h1>Liste des utilisateurs</h1>
<a href="/user/create">Créer un utilisateur</a>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= htmlspecialchars($user['name']) ?> - <?= htmlspecialchars($user['email']) ?>
            <a href="/user/edit/<?= $user['id'] ?>">Modifier</a> <!-- Lien vers l'édition -->
        </li>
    <?php endforeach; ?>
</ul>

