<?php 

    class SignupCtrl extends Signup{

        private $uid;
        private $pwd;
        private $pwdrepeat;
        private $uem;

        public function __construct($uid,$uem,$pwd,$pwdrepeat)
        {
            $this->uid = $uid;
            $this->pwd = $pwd;        
            $this->pwdrepeat = $pwdrepeat;        
            $this->uem = $uem;
    }

    public function signupUser() {
        if($this->emptyInput() == false){
            header("location: ../pages/signup.pages.php?error=emtyinput");
            exit();
        }
        // if($this->isValidUid() == false){
        //     header("location: ../pages/signup.pages.php?error=username");
        //     exit();
        // }
        if($this->isValidUem() == false){
            header("location: ../pages/signup.pages.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false){
            header("location: ../pages/signup.pages.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false){
                header("location: ../pages/signup.pages.php?error=useroremailTaken");
                exit();
        }
        $this->setUser($this->uid,$this->pwd,$this->uem);
    }

    private function emptyInput() {
        $result = true;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->uem)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    // private function isValidUid() {
    //     $result = true;
    //     if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    private function isValidUem(){
        $result = true;
        if(!filter_var($this->uem, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        return $result;
    }

    private function pwdMatch(){
        $result = true;
        if ($this->pwd !== $this->pwdrepeat){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result = true;
        if (!$this->checkuser($this->uid,$this->uem)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }
}