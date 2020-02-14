<?php $title = "Liste des commentaires signalés" ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>
    <div class="content">
        <h3 class="text-center mt-3">Liste des commentaires signalés</h3>
        <h5 class="text-center text-muted mb-4">Enlever le signalement d'un commentaire en cliquant sur son drapeau rouge. </h5>

        <div class="container comment-block">

            <?php
            while ($comment = $comments->fetch()) {
            ?>

                <div class="new_comment">
                    <ul class="user_comment">
                        <div class="user_avatar">
                            <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Avatar vierge">
                        </div>
                        <div class="comment_body bg-white">
                            <p>
                                <?= nl2br(strip_tags($comment['comment'])) ?>
                            </p>
                        </div>
                        <div class="d-flex comment_toolbar">
                            <div class="comment_details">
                                <ul class="text-muted">
                                    <li><i class="fa fa-clock-o"></i> <?= $comment['comment_date_hr'] ?></li>
                                    <li><i class="fa fa-calendar"></i> <?= $comment['comment_date_fr'] ?></li>
                                    <li><i class="fa fa-pencil"></i> <span class="user"><a href="index.php?action=profil&amp;user=<?= strip_tags($comment['author']) ?>"><strong><?= strip_tags($comment['author']) ?> </strong></a></span></li>
                                </ul>
                            </div>
                            <div class="comment_tools">
                                <ul>
                                    <?php if ($comment['is_reported'] == 0) {
                                        echo '<li><i class="fa fa-flag text-danger"></i></li>';
                                    } else {
                                        echo '<li><a href="admin.php?action=unreportComment&commentId=' . $comment['id'] . '"><i class="fa fa-flag report text-danger"></i></a></li>';
                                    } ?>
                                    <li><a href="admin.php?action=showModifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $comment['post_id'] ?>&amp;reported=1"><b>Modifier</b></a></li>
                                    <li><a href="admin.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $comment['post_id'] ?>&amp;reported=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le commentaire de <?= $comment['author'] ?> ?')"><b class="text-danger">Supprimer</b></a></li>

                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
    <footer class="page-footer sticky-footer" >
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>