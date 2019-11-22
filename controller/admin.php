<?php

require_once('model/PostAdmin.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

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

function modifyPost($postTitle, $content, $postId)
{
    $postAdmin = new PostAdmin();

    $modifiedLines = $postAdmin->modifyPost($postTitle, $content, $postId);

    if ($modifiedLines === false) {
        throw new Exception('Impossible de modifier le billet !');
    }
    else {
        header('Location: admin.php');
    }
}

function modifyComment($content, $commentId)
{
    $postAdmin = new PostAdmin();

    $modifiedLines = $postAdmin->modifyComment($content, $commentId);

    if ($modifiedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: admin.php?action=post&id=' . $_GET['post']);
    }
}

function deletePost($postId)
{
    $postAdmin = new PostAdmin();

    $deletedPost = $postAdmin->deletePost($postId);

    if ($deletedPost === false) {
        throw new Exception('Impossible de supprimer ce billet !');
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

function modifyPostView()
{
    $postManager = new PostManager();

    $post = $postManager->getPost($_GET['id']);

    require('view/admin/modifyPostView.php');
}

function modifyCommentView($commentId)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->getComment($commentId);

    require('view/admin/modifyCommentView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/admin/postView.php');
}