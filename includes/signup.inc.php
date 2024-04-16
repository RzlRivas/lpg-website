<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $username = $_POST["uid"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // nilagay ko na yung mismomng file name from the files sa left side
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $username, $email, $phone, $address, $pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../index.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../index.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $username, $email, $phone, $address, $pwd);
}    
else {
    header("location: ../index.php");
    exit();
}