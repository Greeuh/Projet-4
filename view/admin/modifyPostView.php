<?php $title = $post['title'] ?>

<?php ob_start(); ?>

<body class="greybg">
    <div class="content">
        <?php require('header.php'); ?>
        <h2 class="text-center m-5">Modification d'un billet existant</h2>

        <div>
            <form action="admin.php?action=modifyPost&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group mb-5">
                    <input type="text" id="postTitle" name="postTitle" placeholder="Titre du billet" value="<?= $post['title'] ?>" class="w-50 m-auto form-control form-control-lg text-center" required>
                </div>
                <div class="form-group m-3">
                    <textarea id="content" name="content" class="form-control" required><?= $post['content'] ?></textarea>
                </div>

                <div class="text-center mt-3">
                    <input type="submit" value="Modifier le billet" class="btn btn-primary">
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