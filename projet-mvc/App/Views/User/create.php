<h1>Créer un utilisateur</h1>
<form action="/user/create" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <button type="submit">Créer</button>
</form>
<a href="/user">Retour à la liste des utilisateurs</a>