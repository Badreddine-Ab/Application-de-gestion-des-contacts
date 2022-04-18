<?php
session_start();
if (isset($_POST["submit"])) {

    //grabing the date
    $fullName = $_POST["fullName"];
    $job = $_POST["job"];
    $phoneNumber = $_POST["phoneNumber"];
    $fixNumber = $_POST["fixNumber"];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/addcontact.classes.php";
    include "../classes/addcontact.ctrl.classes.php";
    $addcontact = new addContactCtrl($fullName,$job,$phoneNumber,$fixNumber);
    print_r($addcontact);
    echo "-";
    print_r($_SESSION["userid"]);
    echo "-";

    // // Running error handlers and user signup
    $addcontact -> addContact();
    

    // // Going back to front page
    header("location: ../pages/profil.pages.php?error=none");
}