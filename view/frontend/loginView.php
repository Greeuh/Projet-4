<?php $title = 'Connexion' ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

<div id="login">
    <h4 style="text-align:center;">Se connecter sur le blog</h4>
    <form action="index.php?action=logUser" method="post">
        <div>
            <label for="pseudo">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudonyme">
        </div><br>
        <div>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" placeholder="Mot de passe">
        </div><br>
        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>