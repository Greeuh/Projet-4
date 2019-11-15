<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Gestion des billets publiés sur le site</h1>
<br>
<?php
while ($data = $posts->fetch()) 
{
?>
    <div class="news">
        <h3>
            <?= strip_tags($data['title']) ?>
            <em><?= $data['creation_date_fr'] ?></em>
        </h3>

        <p style="display:flex; justify-content:space-between; align-items:center;">
            <b><a href="admin.php?action=showModifyPost&amp;id=<?= $data['id'] ?>">Modifier</a></b>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a>
            <b>Supprimer</b>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<br>
<p><a href="admin.php">Retour au panneau d'administration.</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>