<?php $title = strip_tags($_GET['user']); ?>

<?php ob_start(); ?>

<body class="whitebg">

    <?php require('header.php'); ?>

    <div class="content">
        <div class="d-flex container justify-content-center my-5">


            <div class="user_avatar_profile mx-5">
                <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Avatar vierge">
            </div>
            <div class="text-center my-auto">

                <h2><?= $getInfosForProfile['pseudo']; ?></h2>
                <h3 class="h5">E-mail : <span class="text-muted">
                        <?php
                        if ($_SESSION != NULL && $_SESSION['admin'] == 1) {
                            echo $getInfosForProfile['email'];
                        } else {
                            echo 'non-divulgué';
                        };
                        ?></span></h3>
                <h3 class="h5">Inscrit le : <span class="text-muted"><?= $getInfosForProfile['register_date_fr']; ?></span></h3>
            </div>

        </div>

        <div class="container comment-block" id="comments">
            <h2>Commentaires</h2>

            <?php
            while ($comment = $getCommentsForProfile->fetch()) {
            ?>
                <div class="new_comment">
                    <ul class="user_comment">
                        <div class="user_avatar">
                            <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Avatar vierge">
                        </div>
                        <div class="comment_body">
                            <p>
                                <?= nl2br(strip_tags($comment['comment'])) ?>
                            </p>
                        </div>
                        <div class="d-flex comment_toolbar">
                            <div class="comment_details">
                                <ul class="text-muted">
                                    <li><i class="fa fa-clock-o"></i> <?= $comment['comment_date_hr'] ?></li>
                                    <li><i class="fa fa-calendar"></i> <?= $comment['comment_date_fr'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php
            };
            $getCommentsForProfile->closeCursor();
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