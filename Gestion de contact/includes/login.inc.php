<?php
session_start();
if (isset($_POST["submit"])) {

    //grabing the date
    
    $uem = $_POST["uem"];
    $pwd = $_POST["pwd"];
    

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login.ctrl.classes.php";
    $login = new loginCtrl($uem,$pwd);
    print_r($login);
    

    // // Running error handlers and user signup
    $login -> loginUser();

    // // Going back to front page
    header("location: ../pages/profil.pages.php");
}
