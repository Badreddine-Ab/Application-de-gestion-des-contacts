<?php

class Login extends Dbh
{

    protected function getUser($pwd,$uem)
    {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_uem = ?;');


        if (!$stmt->execute(array( $uem,$pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);
        

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        }else if($checkPwd == true){
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_uem = ? AND users_pwd = ?;');

        if (!$stmt->execute(array($uem,$uid, $pwd))) {
            $stmt = null;
            header("location: ../index.php?error=ststfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($user) == 0) return null;

        session_start();
        $_SESSION["userid"] = $user[0]["users_id"];
        $_SESSION["useruid"] = $user[0]["users_uid"];
        $_SESSION["login_date"] = date("Y-m-d H:i:s");
        $stmt = null;
        }
        
        
    }
//     public function findUserByUsernameAndPass($pwd,$uem)
//     {
//         $stmt = $this->connect()->prepare('SELECT * FROM users WHERE  users_uem = :username ;');
        


//         // $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         // $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

//         $stmt->execute(array(
//             ':username'=> $u
//         ));
//         $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         // $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         if(count($user) == 0) return null;
//         return $user[0];
      
//     }
}
