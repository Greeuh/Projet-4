<?php $title = "Ajout d'un billet" ?>

<?php ob_start(); ?>
<h1>Modification d'un commentaire</h1>

<div id="addPost">
    <form action="admin.php?action=modifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['post'] ?>" method="post">
        <div>
            <label for="commentAuthor">Auteur : </label>
            <b><?= $comment['author'] ?></b>
        </div><br>
        <div>
            <label for="comment">Le commentaire :</label><br>
            <textarea id="comment" name="comment" rows="14" cols="75"><?= $comment['comment'] ?></textarea>
        </div>
        <br>
        <div>
            <input type="submit" value="Modifier le commentaire">
        </div>
    </form>
</div>

<p><a href="admin.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour à la liste des commentaires</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>