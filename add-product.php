<?php

global $db;
if (isset($_POST["title_edit"])) {
    
    try{
        $productTitle = $_POST["title_edit"];
        $productCollection = $_POST["collection_edit"];
        $productColor = $_POST["color_edit"];
        $productCategory = $_POST["category_edit"];
        $productDescription = $_POST["description_edit"];
        $productPrice = $_POST["price_edit"];
        $productImage1 = $_POST["image1_edit"];
        $productImageAlt1 = $_POST["imageAlt1_edit"];
        $productImage2 = $_POST["image2_edit"];
        $productImage3 = $_POST["image3_edit"];
        $productStock = $_POST["stock_edit"];
        $sql = "INSERT INTO products (`title`, `collection`, `color`, `category`, `description`, `price`, `image1`, `alt1`, `image2`, `image3`, `stock`) VALUES ('".$productTitle."', '".$productCollection."', '".$productColor."', '".$productCategory."', '".$productDescription."', '".$productPrice."', '".$productImage1."', '".$productImageAlt1."', '".$productImage2."', '".$productImage3."','".$productStock."')";
        $db->query($sql);
        ?><p class="alert">Product added!</p><?php        
    }catch(Exception $e){
        ?><p class="alert alert-error"><?= "Invalid format!"?></p><?php 
    }

} ?>

<div class="add-product-card"> 
    <div>                       
        <form method="POST" name="edit_product_data" action="">     

        <label for="title_edit">TITLE</label></br>
        <input type="text"  name="title_edit" value=""></br>
       
        <label for="price_edit">PRICE</label></br>          
        <input  type="text"  name="price_edit" value=""></br>
       
        <label for="color_edit">COLOR</label></br>          
        <input  type="text"  name="color_edit" value=""></br>
       
        <label for="stock_edit">STOCK</label></br>          
        <input  type="text"  name="stock_edit" value=""></br>
       
        <label for="category_edit">CATEGORY</label></br>          
        <input  type="text"  name="category_edit" value=""></br>
       
        <label for="collection_edit">COLLECTION</label></br>    
        <select name="collection_edit">
            <option value="livingroom" <?php if (isset($product["collection"]) && $product["collection"] == 'livingroom') { ?>selected <?php }; ?>>living room</option>
            <option value="kitchen" <?php if (isset($product["collection"]) && $product["collection"] == 'kitchen') { ?>selected= <?php }; ?>>kitchen</option>
            <option value="bedroom" <?php if (isset($product["collection"]) && $product["collection"] == 'bedroom') { ?>selected= <?php }; ?>>bedroom</option>
            <option value="bathroom" <?php if (isset($product["collection"]) && $product["collection"] == 'bathroom') { ?>selected= <?php }; ?>>bathroom</option>
        </select></br>
        <label for="status_edit">STATUS</label></br>    
        <select name="status_edit">
            <option value="1" <?php if (isset($product["status"]) && $product["status"] == '1') { ?>selected <?php }; ?>>Enabled</option>
            <option value="0" <?php if (isset($product["status"]) && $product["status"] == '0') { ?>selected <?php }; ?>>Disabled</option>
        </select></br>
        <a href="/admin.php?menu=add_product">Cancel</a>
        </form>
    </div>
    <div>
        <label for="image1_edit">IMAGE1</label></br>          
        <input  type="text"  name="image1_edit" value=""></br>
        
        <label for="imageAlt1_edit">ALT TEXT</label></br>          
        <input  type="text"  name="imageAlt1_edit" value=""></br>
        
        <label for="image2_edit">IMAGE2</label></br>          
        <input  type="text"  name="image2_edit" value=""></br>

        <label for="image3_edit">IMAGE3</label></br>          
        <input  type="text"  name="image3_edit" value=""></br>
       

        <label class="description-edit-title" for="description_edit">DESCRIPTION</label></br>          
        <textarea  class="description-edit"  name="description_edit" value=""></textarea ></br>
        <button type="submit">Validate</button>
        </form>
    </div>
</div>             