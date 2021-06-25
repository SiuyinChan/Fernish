<?php

function connect_db($host = null, $username = null, $passwd = null, $port = null, $db = null){

    $dbh = NULL;
    define("ERROR_LOG_FILE","errors.log", false);

    if(!isset($host) || !isset($username) || !isset($passwd) || !isset($port) || !isset($db)){
        echo "Bad params! Usage: php connect_db.php host username password port migration" . "\n";
        return;
    }

    try{
        $dbh = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db, $username, $passwd);
    }

    catch(PDOException $e){
        $err_msg = "PDO ERROR: " . $e->getMessage() . " storage in " . ERROR_LOG_FILE . "\n";
        echo $err_msg;
        echo "Error connection to DB" . "\n";
        return false;
    }

    return $dbh;
}

$db = connect_db('yourHostName', 'yourUserName', 'yourPassword', 'yourPort', 'fernish');
?>