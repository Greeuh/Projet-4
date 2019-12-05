<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
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
        $req = $db->prepare('SELECT id, pass, is_admin FROM users WHERE pseudo = ?');
        $req->execute(array($userName));

        $getUserInfo = $req->fetch();

        return $getUserInfo;
    }
}
