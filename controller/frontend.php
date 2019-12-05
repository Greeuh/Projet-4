<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function register()
{
    require('view/frontend/registerView.php');
}

function login()
{
    require('view/frontend/loginView.php');
}

function disconnect()
{
    session_start();
    $_SESSION = array();
    session_destroy();

    setcookie('login', '');
    setcookie('pass_hash', '');

    header('Location: index.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function reportComment($commentId, $postId)
{
    $commentManager = new CommentManager();

    $reportComment = $commentManager->reportComment($commentId);

    if ($reportComment === false) {
        throw new Exception('Impossible de signaler ce commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function createUser($userName, $userPass, $userMail)
{
    $userManager = new UserManager();

    $pass_hash = password_hash($userPass, PASSWORD_DEFAULT);

    $userResult = $userManager->newUser($userName, $pass_hash, $userMail);

    if ($userResult === false) {
        throw new Exception('Impossible de créer ce nouvel utilisateur.');
    } else {
        header('Location: index.php');
    }
}

function logUser($userName, $userPass)
{
    $userManager = new UserManager();

    $getUserInfo = $userManager->getInfos($userName);

    $isPasswordCorrect = password_verify($userPass, $getUserInfo['pass']);

    if (!$getUserInfo) {
        echo "Allo";
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $getUserInfo['id'];
            $_SESSION['pseudo'] = $userName;
            $_SESSION['admin'] = $getUserInfo['is_admin'];
            echo 'Vous êtes connecté ' . $_SESSION['pseudo'] . ' !';
            header('Location: index.php');
        } else {
            echo "Mauvais identifiant ou mot de passe.";
        }
    }
}
