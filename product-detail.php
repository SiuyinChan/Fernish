<?php
global $db;

include_once './config/connect_db.php';
session_start();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productID = (int) $_GET['id'];
} else {
    $productID = 1;
}
$sql = "SELECT * FROM products WHERE id = $productID";
$query = $db->prepare($sql);
$query->execute();
$product = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/scss/style.css">
    <script src="public/scripts/script.js"></script>
    <title><?=$product['title']?> | Fernish</title>
    <meta name="description" content="Meta-description of this product:<?=$product['description']?>">
</head>

<body>
    <?php include_once './src/components/nav-mobile.php'; ?>
    <?php include_once './src/components/header.php'; ?>
<div class="container">  
    <div class="product-page">
        <div class="images">
            <img class="image" src="<?=$product['image1']?>" alt="<?=$product['alt1']?>">
            <img class="image" src="<?=$product['image2']?>" >
            <img class="image" src="<?=$product['image3']?>" >
        </div>
    <div class="product-infos">
        <h1 class="title"> <?=$product['title']?></h1>
        <p class="price">$<?=$product['price']?></p>
        <div class="review-product">
            <img class="review" src="public/assets/icons/star_on.png" alt="">
            <img class="review" src="public/assets/icons/star_on.png" alt="">
            <img class="review" src="public/assets/icons/star_on.png" alt="">
            <img class="review" src="public/assets/icons/star_on.png" alt="">
            <img class="review" src="public/assets/icons/star.png" alt="">
        </div>      
        <h2 class="category"><?=$product['category']?></h2>
        <button class="add-to-cart">Add to cart</button>
        <h3>DESCRIPTION:</h3>
        <p class="description"><?=$product['description']?></p>
    </div>
</div>
</div>

</body>
</html>