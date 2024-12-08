<h1>Liste des utilisateurs</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user['name']) ?> - <?= htmlspecialchars($user['email']) ?>
            <a href="/user/edit/<?= $user['id'] ?>">Modifier</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="/user/create">Créer un utilisateur</a>
