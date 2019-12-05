<?php
session_start();
require('controller/admin.php');

if ($_SESSION['admin'] == 1) {

    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'showListPosts') {
                listPosts();
            }
            if ($_GET['action'] == 'showReportedComments') {
                listReportedComments();
            }
            if ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            if ($_GET['action'] == 'showModifyPost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    modifyPostView();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            if ($_GET['action'] == 'showModifyComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    modifyCommentView($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            }
            if ($_GET['action'] == 'modifyComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        modifyComment($_POST['comment'], $_GET['id']);
                    }else{
                        throw new Exception('Le commentaire est vide.');
                    }
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            }
            if ($_GET['action'] == 'deletePost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    deletePost($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            if ($_GET['action'] == 'modifyPost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['postTitle']) && !empty($_POST['content'])) {
                        modifyPost($_POST['postTitle'], $_POST['content'], $_GET['id']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
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
            if ($_GET['action'] == 'unreportComment') {
                if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                    unreportComment($_GET['commentId']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            }
        } else {
            require('view/admin/index.php');
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    header('Location: index.php');
}
