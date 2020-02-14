<?php $title = "Panel" ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>

    <div class="content">
        <h2 class="text-center my-4">Panneau d'administration</h2>

        <div class="w-75 mx-auto my-5 text-center border border-primary rounded-pill bg-white">
            <a href="admin.php?action=showAddPost">
                <div class="p-3">
                    <p class="my-2 p-2"><b>Ajouter un nouveau billet</b></p>
                </div>
            </a>
        </div>

        <div class="w-75 mx-auto my-5 text-center border border-primary rounded-pill bg-white">
            <a href="admin.php?action=showListPosts">
                <div class="p-3">
                    <p class="my-2 p-2"><b>Gestion des billets existants</b></p>
                </div>
            </a>
        </div>

        <div class="w-75 mx-auto my-5 text-center border border-primary rounded-pill bg-white">
            <a href="admin.php?action=showReportedComments">
                <div class="p-3">
                    <p class="my-2 p-2"><b>Liste des commentaires signalés</b></p>
                </div>
            </a>
        </div>

    </div>
    <footer class="page-footer sticky-footer" >
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>