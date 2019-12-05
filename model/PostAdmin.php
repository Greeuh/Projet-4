<?php
require_once("model/Manager.php");

class PostAdmin extends Manager
{
    public function addPost($postTitle, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $post->execute(array($postTitle, $content));

        return $affectedLines;
    }

    public function modifyPost($postTitle, $content, $postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts SET title = ?, content = ?, modify_date = NOW() WHERE id=?');
        $modifiedLines = $post->execute(array($postTitle, $content, $postId));

        return $modifiedLines;
    }

    public function modifyComment($commentContent, $commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET comment = ?, modify_date = NOW() WHERE id=?');
        $modifiedLines = $comment->execute(array($commentContent, $commentId));

        return $modifiedLines;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE posts, comments FROM posts LEFT JOIN comments ON (posts.id = comments.post_id) WHERE posts.id = ?');
        $deletedPost = $post->execute(array($postId));

        return $deletedPost;
    }
}
