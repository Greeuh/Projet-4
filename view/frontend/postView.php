<?php $title = strip_tags($post['title']); ?>

<?php ob_start(); ?>

<body class="whitebg">

    <?php require('header.php'); ?>


    <div id="blue-top-post" class="">
    </div>

    <section class="container" id="main_post">

        <img src="https://i.pinimg.com/originals/99/66/11/996611498ee534b67c325c3d116b5f6f.jpg" alt="Photo de livre ouvert" id="top-img" class="w-100 m-auto">

        <h2 class="text-center mb-5 mt-3 mx-auto"><?= strip_tags($post['title']) ?></h2>
        <div class="text-justify m-auto">
            <?= nl2br(($post['content'])) ?>
        </div>
        <div class="text-muted mt-5">
            <em>
                <?= $post['creation_date_fr']; ?>
            </em>
            <?php
            if ($post['modify_date_fr'] != NULL) {
                echo ' - Mise à jour le : <em>' . $post['modify_date_fr'] . '</em>';
            };
            ?>
        </div>
    </section>
    <div id="separator-post">
        <div class="grey-line-separator"></div>
        <div class="container d-flex justify-content-center mx-auto my-4 w-75">
            <div class="d-flex justify-content-between align-self-start">
                <div id="img-author" class="d-inline-block m-auto p-auto">
                    <img src="https://www.antoineparriaud.fr/images/jean_forteroche.jpg" alt="Photo de Jean Forteroche" class="w-75 d-inline-block">
                </div>
                <div class="align-items-center my-auto mx-3 p-auto" id="infos-author">
                    <h5 class="text-center">JEAN FORTEROCHE</h5>
                    <h6 class="text-center">ACTEUR ET ÉCRIVAIN</h6>
                </div>
            </div>
            <p class="text-center align-self-end m-auto p-auto" id="infos-author-2">Morbi vestibulum nulla in augue vestibulum, nec faucibus libero eleifend. Praesent faucibus ante eget eros auctor, ut pretium purus pharetra. Nullam vehicula augue elementum diam.</p>
        </div>
        <div class="grey-line-separator"></div>
    </div>

    <div class="container comment-block" id="comments">


        <?php if (isset($_SESSION['id'])) { ?>
            <div class="create_new_comment">
                <div class="user_avatar">
                    <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Avatar vierge">
                </div>
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div>
                        <input type="hidden" id="author" name="author" value="<?= $_SESSION['pseudo'] ?>">
                    </div>
                    <div class="input_comment">
                        <input type="text" id="comment" name="comment" placeholder="Réagissez..." required>
                        <input type="submit" class="btn fa m-auto" id="buttonSend" value="&#xf1d8;">
                    </div>
                </form>
                <div class="d-flex comment_toolbar">
                    <div class="comment_details w-100">
                        <ul class="text-muted">
                            <li>Vous êtes connecté en tant que : <strong><?= $_SESSION['pseudo'] ?> </strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="text-center mb-4">
                <h5>Vous devez être connecté pour pouvoir poster un commentaire.</h5>
                <a href="index.php?action=login" class="font-weight-bold">Se connecter</a> ou <a href="index.php?action=register" class="font-weight-bold">S'enregistrer</a>
            </div>
        <?php } ?>


        <?php
        while ($comment = $comments->fetch()) {
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
                        <div class="comment_details w-75">
                            <ul class="text-muted">
                                <li><i class="fa fa-clock-o"></i> <?= $comment['comment_date_hr'] ?></li>
                                <li><i class="fa fa-calendar"></i> <?= $comment['comment_date_fr'] ?></li>
                                <li><i class="fas fa-user"></i> <span class="user"><a href="index.php?action=profil&amp;user=<?= strip_tags($comment['author']) ?>"><strong><?= strip_tags($comment['author']) ?> </strong></a></span></li>
                            </ul>
                        </div>
                        <div class="comment_tools w-25">
                            <ul class="m-0 p-0" id="report_button">
                                <?php if ($comment['is_reported'] == 1) {
                                    echo '<li class="default-cursor"><i class="fa fa-flag text-danger"></i></li>';
                                } else {
                                    echo '<a href="index.php?action=reportComment&id=' . $_GET['id'] . '&commentId=' . $comment['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir signaler le commentaire de ' . $comment['author'] . '?\')"><li><span class="text-danger font-weight-bold">Signaler</span> <i class="far fa-flag report text-danger"></i></li></a>';
                                } ?>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>

        <?php
        }
        ?>

    </div>


    <footer class="page-footer" id="sticky-footer">
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>