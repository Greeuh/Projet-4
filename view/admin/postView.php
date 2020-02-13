<?php $title = strip_tags($post['title']); ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>

    <section class="container my-5 mx-auto">
        <h2 class="text-center mb-5"><?= strip_tags($post['title']) ?></h2>
        <div class="mb-5">
            <?= nl2br(($post['content'])) ?>
        </div>
        <div class="text-muted w-100 d-flex justify-content-between">
            <div class="d-inline text-left">
                <em>
                    <?= $post['creation_date_fr']; ?>
                </em>
                <?php
                if ($post['modify_date_fr'] != NULL) {
                    echo ' - Mise à jour le : <em>' . $post['modify_date_fr'] . '</em>';
                };
                ?>
            </div>
            <div class="d-inline text-right">
                <b><a href="admin.php?action=showModifyPost&amp;id=<?= $_GET['id'] ?>">Modifier </a></b> - 
                <b><a href="admin.php?action=deletePost&amp;id=<?= $_GET['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le billet : <?= $post['title'] ?> ?')" class="text-danger"> Supprimer</a></b>
            </div>
        </div>
    </section>

    <div class="container comment-block" id="comments">
        <h2 class="text-center border-top">Liste des commentaires associés</h2>
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
                                    echo '<li class="default-cursor"><i class="fa fa-flag""></i></li>';
                                } else {
                                    echo '<li><a href="admin.php?action=unreportComment&commentId=' . $comment['id'] . '"><i class="fa fa-flag report text-danger"></i></a></li>';
                                } ?>
                                <li><a href="admin.php?action=showModifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['id'] ?>&amp;reported=1"><b>Modifier</b></a></li>
                                <li><a href="admin.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['id'] ?>&amp;reported=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le commentaire de <?= $comment['author'] ?> ?')"><b class="text-danger">Supprimer</b></a></li>

                            </ul>
                        </div>
                    </div>
                </ul>
            </div>

        <?php
        }
        ?>

    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>