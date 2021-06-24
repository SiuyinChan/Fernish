<?php
//DELETE PRODUCT
global $db;
if(isset($_POST['delete_product']) && !empty($_POST['delete_product'])){
    $id = $_POST['delete_product'];
    $sql = "SELECT * FROM products WHERE id= '".$id."'";
    $result = $db->query($sql);
    
    try{
        if ($result->rowCount() != 1) {
            throw new Exception ('Invalid Product!');      
        }
        $db->query("DELETE FROM products WHERE id= '".$id."'"); 
         ?><p class="alert">Product deleted!</p><?php
    }catch (Exception $e){
        ?><p class="alert alert-error"><?=$e->getMessage();?></p><?php        
    }      
}

//EDIT PRODUCT CARD
if(isset($_POST['edit_product']) && !empty($_POST['edit_product'])){
    $id = $_POST['edit_product'];
    $sql = "SELECT * FROM products WHERE id= '".$id."'";
    $query = $db->prepare($sql);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);        
    if (isset($product)){?>
        <div class="grey-background"></div>
        <div class="edit-product-card">
            <p class="id">ID#_<?= $product["id"]; ?></p>                
            <form method="POST" name="edit_product_data" action=""> 
                <input type="hidden"  name="id_edit" value="<?=$product["id"];?>">

                <label for="title_edit">TITLE</label></br>          
                <input type="text"  name="title_edit" value="<?=$product["title"];?>"></br>
                
                <label for="price_edit">PRICE</label></br>          
                <input  type="text"  name="price_edit" value="<?=$product["price"];?>"></br>
                
                <label for="collection_edit">COLLECTION</label></br>    
                <select name="collection_edit">
                    <option value="livingroom" <?php if (isset($product["collection"]) && $product["collection"] == 'livingroom') { ?>selected="true" <?php }; ?>>livingroom</option>                      
                    <option value="kitchen" <?php if (isset($product["collection"]) && $product["collection"] == 'kitchen') { ?>selected="true" <?php }; ?>>kitchen</option>                      
                    <option value="bedroom" <?php if (isset($product["collection"]) && $product["collection"] == 'bedroom') { ?>selected="true" <?php }; ?>>bedroom</option>                      
                    <option value="bathroom" <?php if (isset($product["collection"]) && $product["collection"] == 'bathroom') { ?>selected="true" <?php }; ?>>bahtroom</option>                                         
                </select></br>
                
                <label for="image_edit">IMAGE</label></br>          
                <input  type="text"  name="image1_edit" value="<?=$product["image1"];?>"></br>
                
                <label for="status_edit">STATUS</label></br>    
                <select name="status_edit">
                    <option value="1" <?php if (isset($product["status"]) && $product["status"] == '1') { ?>selected="true" <?php }; ?>>Enabled</option>
                    <option value="0" <?php if (isset($product["status"]) && $product["status"] == '0') { ?>selected="true" <?php }; ?>>Disabled</option>  
                </select></br>

                <label class="description-edit-title" for="description_edit">DESCRIPTION</label></br>          
                <textarea  class="description-edit"  name="description_edit" value="<?=$product["description"];?>"><?=$product["description"];?></textarea ></br>

                <a href="/admin.php?menu=products">Cancel</a>              
                <button type="submit">Valide</button>               
            </form>
        </div>                       
   <?php }  
}

//EDIT PRODUCT REQUEST
if(isset($_POST['title_edit']) || isset($_POST['description_edit']) || isset($_POST['price_edit']) || isset($_POST['collection_edit']) || isset($_POST['image1_edit']) || isset($_POST['status_edit'] )){
    $id = $_POST['id_edit'];
    $title = $_POST['title_edit'];
    $description = $_POST['description_edit'];
    $price = $_POST['price_edit'];
    $collection = $_POST['collection_edit'];
    $image1 = $_POST['image1_edit'];
    $status = $_POST['status_edit'];
   
    
    try{       
        if(empty($title) || empty($description) || empty($price) || empty($collection) || empty($image1)){
            throw new Exception ('Error: empty field!');            
        }
        $sql = "UPDATE products SET title='$title', description='$description', price='$price', collection='$collection', image1='$image1', status='$status' WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();        
    ?><p class="alert">Successful edition!</p><?php
    }catch (Exception $e){
        ?><p class="alert alert-error"><?=$e->getMessage();?></p><?php
    }
}
?>

<?php
//IMPORT USERS LIST
$sql = "SELECT * FROM products";
$result = $db->query($sql);
?>
<div class="table-header-products">
    <ul>       
        <li>Title</li>
        <li>Collection</li>
        <li>Price</li>
        <li>Status</li>
        <li>Delete product</li>
        <li>Edit product</li>        
    </ul>
</div>

<?php while ($product = $result->fetch()) { ?>
    <div class="display_products">           
        <p class="title"><?= $product["title"]; ?></p>
        <p class="collection"><?= $product["collection"]; ?></p>
        <p class="price"><?= $product["price"]; ?>$</p>
        <p class="status <?php if($product['status'] == 0) echo "status-false"; ?>" ><?= $product["status"]; ?></p>
        <form method="POST" action="">            
            <button class="delete" type="submit"  name="delete_product" value="<?=$product["id"];?>">Delete</button>
        </form>
        <form method="POST" action="">
            <button class="edit" type="submit"  name="edit_product" value="<?=$product["id"];?>">Edit</button>
        </form>        
     </div>
<?php }?>
