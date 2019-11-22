<?php $title = strip_tags($post['title']); ?>

<?php ob_start(); ?>
<h1>Bienvenue sur mon blog</h1>
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
        <p><strong><?= strip_tags($comment['author']) ?> </strong><?= $comment['comment_date_fr']  ?><a href="admin.php?action=showModifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['id'] ?>"><b> - Modifier</b></a><?php if ($comment['modify_date_fr'] != NULL){ echo '<br>Mis à jour le : ' . $comment['modify_date_fr'];} ?></p>
        <p><?= nl2br(strip_tags($comment['comment'])) ?></p>
    <?php
    }
    ?>
    <br>
    <p><a href="admin.php?action=showListPosts">Retour à la liste des billets</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>