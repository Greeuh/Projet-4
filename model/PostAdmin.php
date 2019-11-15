<?php
require_once("model/Manager.php");

class PostAdmin extends Manager
{
    public function addPost($postTitle, $content)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $comments->execute(array($postTitle, $content));

        return $affectedLines;
    }

    public function modifyPost()
    {

    }
}
