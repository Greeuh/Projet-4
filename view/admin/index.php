<?php $title = "Panel" ?>

<?php ob_start(); ?>
<h1>Panneau d'administration</h1>

<div id="addPost" style="text-align:center; border: 2px solid black;">
    <a href="admin.php?action=showAddPost"><p><b>Ajouter un nouveau billet</b></p></a>
</div>
<br>
<div id="addPost" style="text-align:center; border: 2px solid black;">
    <a href="admin.php?action=showListPosts"><p><b>Gestion des billets existants</b></p></a>
</div>
<br>
<div id="addPost" style="text-align:center; border: 2px solid black;">
    <a href="admin.php?action=showReportedComments"><p><b>Liste des commentaires signalés</b></p></a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>