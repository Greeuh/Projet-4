<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur mon blog</h1>
<h2>Les derniers billets du blog :</h2>

<?php
while ($data = $posts->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?= strip_tags($data['title']) ?><br>
            <em>
                <?= $data['creation_date_fr']; ?>
            </em>
            <?php
                if ($data['modify_date_fr'] != NULL) {
                    echo ' - Mise à jour le : <em>' . $data['modify_date_fr'] . '</em>';
                };
                ?>
        </h3>

        <p>
            <?= nl2br(strip_tags($data['content'])) ?>
            <br>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>