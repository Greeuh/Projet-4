<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        if ($_GET['action'] == 'register') {
            register();
        }
        if ($_GET['action'] == 'createUser') {
            if (isset($_POST['pseudo']) && $_POST['password'] && $_POST['verifpassword']  && $_POST['email']) {
                if ($_POST['password'] === $_POST['verifpassword']) {
                    createUser($_POST['pseudo'], $_POST['password'], $_POST['email']);
                } else {
                    throw new Exception('Les deux mot de passe ne sont pas identiques !');
                }
            } else {
                throw new Exception('Toutes les informations n\'ont pas été correctement rentrées.');
            }
        }
        if ($_GET['action'] == 'login') {
            login();
        }
        if ($_GET['action'] == 'logUser') {
            if (isset($_POST['pseudo']) && $_POST['password']) {
                logUser($_POST['pseudo'], $_POST['password']);
            } else {
                throw new Exception('Toutes les informations n\'ont pas été correctement rentrées.');
            }
        }
        if ($_GET['action'] == 'disconnect') {
            disconnect();
        }
        if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        if ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                    reportComment($_GET['commentId'], $_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
