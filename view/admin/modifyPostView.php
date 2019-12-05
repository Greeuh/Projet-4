<?php $title = $post['title'] ?>

<?php ob_start(); ?>
<h1>Modification d'un billet existant</h1>

<div id="addPost">
    <form action="admin.php?action=modifyPost&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="postTitle">Titre :</label><br>
            <input type="text" id="postTitle" name="postTitle" placeholder="Titre du billet" value="<?= $post['title'] ?>">
        </div><br>
        <div>
            <label for="content">Votre article :</label><br>
            <textarea id="content" name="content"><?= $post['content'] ?></textarea>
        </div>
        <br>
        <div>
            <input type="submit" value="Modifier l'article">
        </div>
    </form>
</div>

<p><a href="admin.php">Retour au panneau d'administration.</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>