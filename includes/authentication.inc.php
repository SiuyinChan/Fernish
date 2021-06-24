<?php

namespace includes;
include_once "../src/connect_db.php";

class Authentication
{
    private $username;
    private $email;
    private $pwd;
    private $pwdRepeat;

    public function __construct($username, $pwd, $email = NULL, $pwdRepeat = NULL)
    {
        $this->$username = $username;
        $this->$email = $email;
        $this->$pwd = $pwd;
        $this->$pwdRepeat = $pwdRepeat;
    }

    public function emptyInputSignup($username, $email, $pwd, $pwdRepeat)
    {
        $result;
        if (empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function invalidUid($username)
    {
        $result;
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function invalidEmail($email)
    {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function pwdMatch($pwd, $pwdRepeat)
    {
        $result;
        if ($pwd !== $pwdRepeat) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function uidExists($db, $username, $email)
    {
        $result1 = $db->query("SELECT username FROM users WHERE username = '" . $username . "'");
        $result2 = $db->query("SELECT email FROM users WHERE email = '" . $email . "'");
        if ($result1->rowCount() > 0 || $result2->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createUser($db, $username, $email, $pwd)
    {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $db->query("INSERT INTO users (username, password, email, admin) VALUES ('" . $username . "', '" . $hashedPwd . "', '" . $email . "', \"0\")");

        header("location: ../signin.php");
        exit();
    }

    public function emptyInputLogin($username, $pwd)
    {
        $result;
        if (empty($username) || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function loginUser($db, $username, $pwd)
    {
        $uidExists = $this->uidExists($db, $username, $username);
        if ($uidExists === false) {
            header("location: ../signin.php?error=wronglogin");
            exit();
        }

        if ($uidExists === true) {
            $sql = "SELECT password FROM users WHERE username = '" . $username . "' OR email = '" . $username . "'";
            $result = $db->prepare($sql);
            $result->execute();
            $pwdHashed = $result->fetch();
            $checkPwd = password_verify($pwd, $pwdHashed["password"]);

            if ($checkPwd === false) {
                header("location: ../signin.php?error=wronglogin");
                exit();
            } else {
                session_start();

                $qry = "SELECT username FROM users WHERE username = '" . $username . "'";
                $stmt = $db->prepare($qry);
                $stmt->execute();
                $data = $stmt->fetch();

                $_SESSION["username"] = $data["username"];


                $sql = "SELECT * FROM users WHERE username = '" . $username . "' OR email = '" . $username . "'";
                $result = $db->prepare($sql);
                $result->execute();
                $user = $result->fetch();
                if ($user["admin"] == 0) {
                    $_SESSION["admin"] = $user["admin"];
                    header("Location: ../index.php");
                    exit();
                } elseif ($user["admin"] == 1) {
                    $_SESSION["admin"] = $user["admin"];
                    header("location: ../admin.php");
                    exit();
                }
            }
        }
    }
}
