<?php

if (isset($_POST["submit"])) {

    //grabing the date
    $uid = $_POST["uid"];
    $uem = $_POST["uem"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup.ctrl.classes.php";
    $signup = new SignupCtrl($uid,$uem,$pwd,$pwdrepeat);
    // print_r($signup);

    // // Running error handlers and user signup
    $signup -> signupUser();

    // // Going back to front page
    header("location: ../pages/signup.pages.php?error=none");
}
