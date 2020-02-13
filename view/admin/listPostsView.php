<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<body class="greybg">
<?php require('header.php'); ?>

<h2 class="text-center m-5">Gestion des billets publiés sur le site</h2>

<?php
while ($data = $posts->fetch()) 
{
?>
    <div class="w-75 mx-auto my-5 px-5 pt-2 bg-white border border-info rounded-lg">
        <h2 class="h4 text-center my-3">
        <?= strip_tags($data['title']) ?>
        </h2>
        <p class="text-muted text-center mt-2 mb-0">
                <?php echo 'Crée le : <em>' . $data['creation_date_fr']; ?>
            </em>
        </p><p class="text-muted text-center mb-3 mt-0">
            <?php
                if ($data['modify_date_fr'] != NULL) {
                    echo 'Dernière mise à jour le : <em>' . $data['modify_date_fr'] . '</em>';
                };
                ?>
        </p>

        <p class="d-flex justify-content-between text-center border-top p-3">
            <b><a href="admin.php?action=showModifyPost&amp;id=<?= $data['id'] ?>">Modifier</a></b>
            <a href="admin.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a>
            <b><a href="admin.php?action=deletePost&amp;id=<?= $data['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le billet : <?= $data['title']?> ?')" class="text-danger">Supprimer</a></b>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>