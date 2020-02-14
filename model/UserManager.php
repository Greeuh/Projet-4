<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function checkIfUserExist($userName, $userMail)
    {
        $db = $this->dbConnect();

        $user_check_query = $db->prepare('SELECT * FROM users WHERE pseudo=? OR email=? LIMIT 1');
        $user_check_query->execute(array($userName,$userMail));

        $userCheck = $user_check_query->fetch();
        
        return $userCheck;
    }

    public function newUser($userName, $userPass, $userMail)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO users(pseudo, pass, email, register_date) VALUES(?, ?, ?, NOW())');
        $userResult = $user->execute(array($userName, $userPass, $userMail));

        return $userResult;
    }

    public function getInfos($userName)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass, is_admin, pseudo FROM users WHERE pseudo = ?');
        $req->execute(array($userName));

        $getUserInfo = $req->fetch();

        return $getUserInfo;
    }

    public function getCommentsForProfile($author)
    {
        $db = $this->dbConnect();
        $getProfilInfos = $db->prepare('SELECT id, author, comment, is_reported, DATE_FORMAT(comment_date, \'%H:%i:%s\') AS comment_date_hr, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr, DATE_FORMAT(modify_date, \'%d/%m/%Y à %Hh%i\') AS modify_date_fr FROM comments WHERE author = ? ORDER BY comment_date DESC');
        $getProfilInfos->execute(array($author));

        return $getProfilInfos;
    }

    public function getInfosForProfile($userName)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, email, DATE_FORMAT(register_date, \'%d/%m/%Y à %Hh%i\') AS register_date_fr FROM users WHERE pseudo = ?');
        $req->execute(array($userName));

        $getUserInfo = $req->fetch();

        return $getUserInfo;
    }
    
}
