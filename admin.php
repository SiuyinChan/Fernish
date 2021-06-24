<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    header("Location: ./signin.php");
    exit();
}
?>
<?php include_once './src/connect_db.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/scss/style.css">
    <script src="public/scripts/script.js"></script>
    <title>FERNISH: admin panel</title>
    <meta name="description" content="Admin panel">
    
</head>

<body class="admin-body">
    
    <?php include_once './src/components/header-admin.php'; ?>
<div class="admin">
    <div class="admin-menu">
        <h3><a href = "./admin.php">ADMINISTRATOR</a></h3>
        
        <a href="./admin.php?menu=users" name="users" value="users" onclick="">USERS</a>
        <a href="./admin.php?menu=products">PRODUCTS</a>
        <a href="./admin.php?menu=add_product">ADD PRODUCT</a>
    </div>

    <div class="admin-panel">
        <?php 
        if(!isset($_GET['menu'])){            
            include_once './users-admin.php';
        }
        elseif($_GET['menu'] == 'users') {        
            include_once './users-admin.php';
        }elseif($_GET['menu'] == 'products'){            
            include_once './products-admin.php';
        }elseif($_GET['menu'] == 'add_product'){            
            include_once './add-product.php';
        }else{
            include_once './users-admin.php';
        }
        ?>
    </div>
</div>

</body>
</html>