<?php 

    class loginCtrl extends Login{

        
        private $pwd;
        
        private $uem;

        public function __construct($uem,$pwd)
        {
            
            $this->pwd = $pwd;        
                  
            $this->uem = $uem;
    }

    public function loginUser() {
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emtyinput");
            exit();
        }
        
        $this->getUser($this->pwd,$this->uem);
    }

    private function emptyInput() {
        $result = true;
        if( empty($this->pwd) || empty($this->uem)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

   
}