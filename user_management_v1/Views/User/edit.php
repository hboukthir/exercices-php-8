<h1>Modifier l'utilisateur</h1>

<form action="/user/edit/<?= $user['id'] ?>" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <button type="submit">Mettre à jour</button>
</form>

<a href="/user">Retour à la liste des utilisateurs</a>
