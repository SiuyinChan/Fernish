<?php include_once './config/connect_db.php';?>
<?php session_start(); ?>

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

<div class="signin-form">
        <h2 class="signin-title">Log In</h2><br/>
        <form action="includes/login.inc.php" method="post">
            <label for="uid">User ID :<br/></label>
            <input type="text" name="uid" placeholder="Username/Email..."><br/><br/>
            <label for="pwd">Password :<br/></label>
            <input type="password" name="pwd" placeholder="Password..."><br/><br/>
            <button type="submit" name="submit"> Log In</button><br/><br/>
        </form>
        <p>Don't have an account? <a href="signup.php">Create one</a>.

    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        } 
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information!</p>";
        } 
    }

    ?>
</div>

</body>
</html>