<?php 

    class addContactCtrl extends Add{

        private $fullName;
        private $job;
        private $phoneNumber;
        private $fixNumber;

        public function __construct($fullName,$job,$phoneNumber,$fixNumber)
        {
            $this->fullName = $fullName;
            $this->job = $job;        
            $this->phoneNumber = $phoneNumber;        
            $this->fixNumber = $fixNumber;
    }

    public function addContact() {
        if($this->emptyInput() == false){
            header("location: ../pages/profil.pages.php?error=emtyinput");
            exit();
        }
       
        $this->setContact($this->fullName,$this->job,$this->phoneNumber,$this->fixNumber);
    }

    private function emptyInput() {
        $result = true;
        if(empty($this->fullName) || empty($this->phoneNumber)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    protected function getContact($fullName,$job,$phoneNumber,$fixNumber)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM `contact` WHERE id_cont=(SELECT MAX(id) FROM `contact`) AND users_id = $_SESSION["userid"];');
        if (!$stmt->execute(array($fullName,$job,$phoneNumber,$fixNumber,$_SESSION["userid"]))) {
            $stmt = null;
            header("location: ../pages/profil.pages.php?error=ststfailed");
            exit();
        }

        $stmt = null;
    }



    
}