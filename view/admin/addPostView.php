<?php $title = "Ajout d'un billet" ?>

<?php ob_start(); ?>
<h1>Ajout d'un nouveau billet</h1>

<div id="addPost">
    <h4 style="text-align:center;">Ajouter un nouveau billet</h4>
    <form action="admin.php?action=addPost" method="post">
        <div>
            <label for="postTitle">Titre :</label><br>
            <input type="text" id="postTitle" name="postTitle" placeholder="Titre du billet">
        </div><br>
        <div>
            <label for="content">Votre article :</label><br>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</div>

<p><a href="admin.php">Retour au panneau d'administration.</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>