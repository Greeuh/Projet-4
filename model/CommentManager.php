<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, is_reported, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %H:%i:%s\') AS comment_date_fr, DATE_FORMAT(modify_date, \'%d/%m/%Y à %Hh%i\') AS modify_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, is_reported, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %H:%i:%s\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));

        $comment = $req->fetch();

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, is_reported) VALUES(?, ?, ?, NOW(), ?)');
        $affectedLines = $comments->execute(array($postId, $author, $comment, 0));

        return $affectedLines;
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET is_reported = 1 WHERE id=?');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function unreportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET is_reported = 0 WHERE id=?');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function getReportedComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT post_id, id, author, comment, is_reported, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %H:%i:%s\') AS comment_date_fr, DATE_FORMAT(modify_date, \'%d/%m/%Y à %Hh%i\') AS modify_date_fr FROM comments WHERE is_reported = 1 ORDER BY comment_date DESC');

        return $comments;
    }
}
