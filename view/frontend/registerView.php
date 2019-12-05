<?php $title = 'Inscription' ?>

<?php ob_start(); ?>
<h1>Inscription</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

<div id="register">
    <h4 style="text-align:center;">S'inscrire sur le blog</h4>
    <form action="index.php?action=createUser" method="post">
        <div>
            <label for="pseudo">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudonyme">
        </div><br>
        <div>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" placeholder="Mot de passe">
        </div><br>
        <div>
            <label for="verifpassword">Répéter le mot de passe :</label><br>
            <input type="password" id="verifpassword" name="verifpassword" placeholder="Répéter le mot de passe">
        </div><br>
        <div>
            <label for="email">E-mail :</label><br>
            <input type="email" id="email" name="email" placeholder="E-mail">
        </div><br>
        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>