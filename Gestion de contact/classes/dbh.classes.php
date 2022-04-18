<?php 

    class Dbh {

        public function connect(){
            try {
                $username = "root";
                $password = "Badr@2001";
                $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
                return $dbh;
            } catch (PDOException $e) {
                print "Error!:" . $e->getMessage() . "<br/>";
                die();
            }
        }     
}