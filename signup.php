<?php include_once './config/connect_db.php';?>
<?php session_start(); ?>z

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/scss/style.css">
    <script src="public/scripts/script.js"></script>
    <title>FERNISH: premium furniture & home design</title>
    <meta name="description" content="Enjoy premium furniture & décor rentals, delivered and assembled in a week. Pay monthly, and decide later if you want to keep, return, or swap your pieces.">
</head>

<body>
    
    <?php include_once './src/components/header.php'; ?>

<div class="signup-form container">
        <h2 class="signup-title">Sign Up</h2><br/>
        <form action="includes/signup.inc.php" method="post">
            <label for="uid">Username :<br/></label>
            <input type="text" name="uid" placeholder="Username..."><br/>
            <label for="email">Email :<br/></label>
            <input type="text" name="email" placeholder="Email..."><br/>
            <label for="pwd">Password :<br/></label>
            <input type="password" name="pwd" placeholder="Password..."><br/>
            <label for="pwdrepeat">Password Confirmation :<br/></label>
            <input type="password" name="pwdrepeat" placeholder="Repeat password..."><br/>
            <button type="submit" name="submit"> Sign Up</button><br/><br/>
        </form>
    

    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        } elseif ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        } elseif ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        } elseif ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Password don't match!</p>";
        } elseif ($_GET["error"] == "usernametaken") {
            echo "<p>Username already taken!</p>";
        } elseif ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
    }

    ?>

</div>

</body>
</html>