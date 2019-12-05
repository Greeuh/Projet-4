<?php $title = "Liste des commentaires signalés" ?>

<?php ob_start(); ?>
<h1>Liste des commentaires signalés</h1><br>
<h3>Enlever le signalement d'un commentaire en cliquant sur son drapeau rouge. </h3> 

<?php
while ($comment = $comments->fetch()) {
    ?>
    <p><strong><?= strip_tags($comment['author']) ?> </strong><?= $comment['comment_date_fr']  ?> -
        <?php if ($comment['is_reported'] == 0){ echo '<i class="far fa-flag" style="color:red"></i>';}else{echo '<a href="admin.php?action=unreportComment&commentId='. $comment['id'] .'"><i class="fas fa-flag" style="color:red"></i></a>';} ?> - 
        <a href="admin.php?action=showModifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $comment['post_id'] ?>&amp;reported=1"><b>Modifier</b></a>
        <?php if ($comment['modify_date_fr'] != NULL) {
                echo '<br>Mis à jour le : ' . $comment['modify_date_fr'];
            } ?></p>
    <p><?= nl2br(strip_tags($comment['comment'])) ?></p><br>
<?php
}
?>

<p><a href="admin.php">Retour au panneau d'administration.</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>