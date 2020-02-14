<?php $title = "Ajout d'un billet" ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>
    <div class="content">
        <h2 class="text-center m-5">Ajout d'un nouveau billet</h2>

        <div>
            <form action="admin.php?action=addPost" method="post">
                <div class="form-group">
                    <input type="text" id="postTitle" name="postTitle" placeholder="Titre du billet" class="w-50 m-auto form-control form-control-lg text-center" required autofocus>
                </div>
                <div class="form-group m-3">
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="Publier votre nouveau billet" class="btn btn-primary">
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