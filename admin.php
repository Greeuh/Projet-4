<?php
require('controller/admin.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'showListPosts') {
            listPosts();
        }
        if ($_GET['action'] == 'showModifyPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        if ($_GET['action'] == 'showAddPost') {
            require('view/admin/addPostView.php');
        }
        if ($_GET['action'] == 'addPost') {
            if (!empty($_POST['postTitle']) && !empty($_POST['content'])) {
                addPost($_POST['postTitle'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
    } else {
        require('view/admin/index.php');
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
