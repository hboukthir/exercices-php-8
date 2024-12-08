<?php

use app\CsrfToken;

$csrfToken = CsrfToken::generate();
?>

<form method="POST" action="/add">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Add User</button>
</form>
