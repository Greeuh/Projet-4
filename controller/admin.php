<?php

require_once('model/PostAdmin.php');
require_once('model/PostManager.php');

function addPost($postTitle, $content)
{
    $postAdmin = new PostAdmin();

    $affectedLines = $postAdmin->addPost($postTitle, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    }
    else {
        header('Location: admin.php');
    }
}

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/admin/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();

    $post = $postManager->getPost($_GET['id']);

    require('view/admin/modifyPostView.php');
}