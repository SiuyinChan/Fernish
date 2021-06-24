<?php include_once './src/connect_db.php';?>
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
<div class="container">
    <div class="grid">
        <?php include_once './src/components/search-bar.php'; ?>
        <?php include_once './src/components/side-bar.php'; ?>
        <?php include_once './src/components/product-card.php'; ?>
    </div>
    <?php include_once './src/components/pagination.php'; ?>
</div>

</body>
</html>