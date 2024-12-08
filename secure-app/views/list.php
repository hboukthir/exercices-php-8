<?php

use app\Utils;

?>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= Utils::escape($user['name']) ?></td>
            <td><?= Utils::escape($user['email']) ?></td>
            <td><?= Utils::escape($user['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
