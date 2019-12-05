<?php $title = strip_tags($post['title']); ?>

<?php ob_start(); ?>
<h1>Bienvenue sur mon blog</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
        <?= strip_tags($post['title']) ?><br>
            <em>
                <?= $post['creation_date_fr']; ?>
            </em>
            <?php
                if ($post['modify_date_fr'] != NULL) {
                    echo ' - Mise à jour le : <em>' . $post['modify_date_fr'] . '</em>';
                };
                ?>
        </h3>

        <p>
            <?= ($post['content']) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= strip_tags($comment['author']) ?> </strong><?= $comment['comment_date_fr'] ?> 
        <?php if ($comment['is_reported'] == 1){ echo '<i class="fas fa-flag" style="color:red"></i>';}else{echo '<a href="index.php?action=reportComment&id=' . $_GET['id'] .'&commentId='. $comment['id'] .'" onclick="return confirm(\'Êtes-vous sûr de vouloir signaler le commentaire de ' . $comment['author'] . '?\')"><i class="far fa-flag" style="color:red"></i></a>';} ?>
        <?php if ($comment['modify_date_fr'] != NULL){ echo '<br>Mis à jour le : ' . $comment['modify_date_fr'];} ?></p>
        <p><?= nl2br(strip_tags($comment['comment'])) ?></p>
    <?php
    }
    ?>

<?php if(isset($_SESSION['id'])){?>
<div id="addComment">
    <h4 style="text-align:center;">Ajouter un commentaire</h4>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <input type="hidden" id="author" name="author" value="<?= $_SESSION['pseudo'] ?>">
        </div><br>
        <div>
            <label for="comment">Votre commentaire :</label><br>
            <textarea id="comment" name="comment" placeholder="Votre commentaire" rows="10" cols="40"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</div>
<?php }else{?>
    <div style="text-align:center"><h4>Vous devez être connecté pour pouvoir poster un commentaire.</h4>
    <a href="index.php?action=login">Se connecter</a> ou <a href="index.php?action=register">S'enregistrer</a></div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>