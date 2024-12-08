<h1>User List</h1>
<?php if (isset($users) && is_array($users)): ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>
