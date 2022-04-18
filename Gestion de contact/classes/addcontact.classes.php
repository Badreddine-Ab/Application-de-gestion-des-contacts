<?php

class Add extends Dbh {

    protected function setContact($fullName,$job,$phoneNumber,$fixNumber) {
        

        $stmt = $this->connect()->prepare('INSERT INTO contact (fullName_cont, job_cont, phoneNumber_cont,fix_cont, users_id ) VALUES (?,?,?,?,?)');

       

        if (!$stmt->execute(array($fullName,$job,$phoneNumber,$fixNumber,$_SESSION["userid"]))) {
            $stmt = null;
            header("location: ../pages/profil.pages.php?error=ststfailed");
            exit();
        }

        $stmt = null;
    }


    
    

}
