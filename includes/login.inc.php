<?php

global $db;

use includes\Authentication;

if (isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once "../src/connect_db.php";
    require_once "./authentication.inc.php";

    $objLogin = new Authentication($username, $pwd);

    if ($objLogin->emptyInputLogin($username, $pwd) !== false) {
        header("location: ../signin.php?error=emptyinput");
        exit();
    }
    
    $objLogin->loginUser($db, $username, $pwd);
} else {
    header("location: ../signin.php");
    exit();
}