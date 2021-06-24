<?php

use includes\Authentication;

session_start();

if  (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once "../src/connect_db.php";
    require_once "./authentication.inc.php";

    $objSignup = new Authentication($username, $pwd, $email, $pwdRepeat);

    if ($objSignup->emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if ($objSignup->invalidUid($username) !== false) {
        header("location: ../signup.php?error=invalideuid");
        exit();
    }

    if ($objSignup->invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if ($objSignup->pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if ($objSignup->uidExists($db, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    $objSignup->createUser($db, $username, $email, $pwd);

} else {
    header("location: ../signup.php");
}