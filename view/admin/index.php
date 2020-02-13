<?php $title = "Panel" ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>
    <h2 class="text-center my-4">Panneau d'administration</h2>

    <a href="admin.php?action=showAddPost" class="m-5">
        <div class="w-50 m-auto text-center border border-primary rounded-pill bg-white p-3">
            <p class="my-2 p-2"><b>Ajouter un nouveau billet</b></p>
        </div>
    </a>

    <a href="admin.php?action=showListPosts" class="m-5">
        <div class="w-50 m-auto text-center border border-primary rounded-pill bg-white p-3">
            <p class="my-2 p-2"><b>Gestion des billets existants</b></p>
        </div>
    </a>

    <a href="admin.php?action=showReportedComments" class="m-5">
        <div class="w-50 m-auto text-center border border-primary rounded-pill bg-white p-3">
            <p class="my-2 p-2"><b>Liste des commentaires signalés</b></p>
        </div>
    </a>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>