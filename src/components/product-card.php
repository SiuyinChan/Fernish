<?php
global $db;
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}

$query = $db->prepare('SELECT COUNT(*) AS nb_articles FROM products');
$query->execute();
$result = $query->fetch();
$nbArticles = (int) $result['nb_articles'];
$totalPages = ceil($nbArticles/7);
$firstArticle = ($currentPage - 1) * 7;

if(isset($_POST['collection']) || isset($_POST['color']) || isset($_POST['category']) || isset($_POST['pricerange'])) {

    if(isset($_POST['collection'])) {
        $collection = $_POST['collection'];
        $extension1 = "collection = '$collection'";
    } else {
        $extension1 = "collection IS NOT NULL";
    }

    if(isset($_POST['color'])) {
        $color = $_POST['color'];
        $extension2 = "color = '$color'";
    } else {
        $extension2 = "color IS NOT NULL";
    }

    if(isset($_POST['category'])) {
        $category = $_POST['category'];
        $extension3 = "category = '$category'";
    } else {
        $extension3 = "category IS NOT NULL";
    }

    if(isset($_POST['pricerange'])) {
        $min = 0;
        $max = $_POST['pricerange'];
        $extension4 = "(price >= $min AND price <= $max)";
    } else {
        $extension4 = "(price >= 0 AND price <= 1000)";
    }

    $qry = "SELECT * FROM products WHERE " . $extension1 . " AND " . $extension2 . " AND " . $extension3 . " AND " . $extension4 . " LIMIT 7 OFFSET $firstArticle";
} else {
    $qry = "SELECT * FROM products LIMIT 7 OFFSET $firstArticle";
}

if (isset($_POST['submit-search'])) {
    $search = $_POST['search'];
    $ext = "ORDER BY title ASC";

    if (isset($_POST['searchbar-filter'])) {
        if ($_POST['searchbar-filter']=="increasing-price") {
            $ext = "ORDER BY price ASC";
        }

        if ($_POST['searchbar-filter']=="decreasing-price") {
            $ext = "ORDER BY price DESC";
        }

        if ($_POST['searchbar-filter']=="alphabetically") {
            $ext = "ORDER BY title ASC";
        }

        if ($_POST['searchbar-filter']=="reverse-alphabetically") {
            $ext = "ORDER BY title DESC";
        }
            
    }

    $qry = "SELECT * FROM products WHERE title LIKE '%$search%' OR category LIKE '%$search%' OR description LIKE '%$search%' OR collection LIKE '%$search%' OR color LIKE '%$search%' LIMIT 7 OFFSET $firstArticle";
}

$query = $db->prepare($qry);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- DISPLAY MESSAGE IF 0 MATCH -->
<?php if(empty($products)):?>   
    <div class="not-found">
        <img src="../../public/assets/icons/not-found.svg" alt="not found message">
        <p>Sorry... no results found<?php if (isset($_POST['search'])) { ?> with "<?=$_POST['search']?>"<?php } ?>! </p>   
    </div>
 <?php endif; ?>
 
<!-- DISPLAY PRODUCTS -->
<?php foreach ($products as $product):
    if($product['status'] == 0){
        continue;
    }?>
<div class="product-card">
    <a href="/product-detail.php?id=<?=$product['id']?>"><img class="image" id="productImage" src="<?=$product['image1']?>" alt="<?=$product['alt1']?>" onmouseover="this.src='<?=$product['image2']?>'" onmouseout="this.src='<?=$product['image1']?>'"></a>
    <div class="product-infos">
        <a href="/product-detail.php?id=<?=$product['id']?>"><h3 class="title"> <?=$product['title']?></h3></a>
        <p class="price">$<?=$product['price']?></p>
        <p class="category"><?=$product['category']?></p>
        <img class="review" src="../../public/assets/icons/star_on.png" alt="star">
        <img class="review" src="../../public/assets/icons/star_on.png" alt="star">
        <img class="review" src="../../public/assets/icons/star_on.png" alt="star">
        <img class="review" src="../../public/assets/icons/star_on.png" alt="star">
        <img class="review" src="../../public/assets/icons/star.png" alt="star">
        <img class="cart" src="../../public/assets/icons/cart_plus.svg" alt="star">
    </div>
</div>
<?php endforeach; ?>
