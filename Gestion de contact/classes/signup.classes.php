<?php

class Signup extends Dbh
{

    protected function setUser($uid,$pwd,$email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid,  users_uem, users_pwd) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email,$hashedPwd,))) {
            $stmt = null;
            header("location: ../pages/signup.php?error=ststfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $uem)
    {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_uem = ?;');


        if (!$stmt->execute(array($uid, $uem))) {
            $stmt = null;
            header("location: ../pages/signup.pages.php?error=ststfailed");
            exit();
        }

        $resultCheck = true;
        if ($stmt->rowCount()) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }


}
