<?php $title = "Modification d'un commentaire" ?>

<?php ob_start(); ?>

<body class="greybg">
    <?php require('header.php'); ?>
    <div class="content">
        <h2 class="text-center m-5">Modification d'un commentaire</h2>

        <div id="modifyComment">
            <form action="admin.php?action=modifyComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['post'] ?>" method="post">
                <div class="text-center mb-5">
                    <label for="commentAuthor">Auteur du commentaire : </label>
                    <b><?= $comment['author'] ?></b>
                </div>

                <div class="m-auto text-center">
                    <textarea id="comment" name="comment" class="m-auto w-75" rows="20"><?= $comment['comment'] ?></textarea>
                </div>

                <div class="text-center mt-3">
                    <input type="submit" value="Modifier le commentaire" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <footer class="page-footer sticky-footer" >
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>