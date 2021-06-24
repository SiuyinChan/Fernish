<div id="sideBarDropdown" onclick="sideBarDropdown()">Filters <span class="toggle">+</span></div>
<div class="side-bar side-bar-mobile">    
    <p class="title">FILTER BY</p>
    <form action="" method="post" name="reset">
    <input type="submit" class="reset" value="RESET" onclick="this.form.submit()">
    </form> 
    

<form action="" method="post">

    <div>        
        <select class="filter" name="collection" id="collection" onchange="this.form.submit()">
            <option value="" disabled selected hidden>Collection</option>
            <option value="livingroom" <?php if (isset($_POST['collection']) && $_POST['collection'] == 'livingroom') { ?>selected <?php }; ?>>Living Room</option>
            <option value="kitchen" <?php if (isset($_POST['collection']) && $_POST['collection'] == 'kitchen') { ?>selected <?php }; ?>>Kitchen</option>
            <option value="bedroom" <?php if (isset($_POST['collection']) && $_POST['collection'] == 'bedroom') { ?>selected <?php }; ?>>Bedroom</option>
            <option value="bathroom" <?php if (isset($_POST['collection']) && $_POST['collection'] == 'bathroom') { ?>selected <?php }; ?>>Bathroom</option>
        </select>
    </div>
    
    <div>            
        <select class="filter" name="color" id="color" onchange="this.form.submit()">
            <option value="" disabled selected hidden>Color</option>
            <option value="beige" <?php if (isset($_POST['color']) && $_POST['color'] == 'beige') { ?>selected <?php }; ?>>Beige</option>
            <option value="black" <?php if (isset($_POST['color']) && $_POST['color'] == 'black') { ?>selected <?php }; ?>>Black</option>
            <option value="brown" <?php if (isset($_POST['color']) && $_POST['color'] == 'brown') { ?>selected <?php }; ?>>Brown</option>
            <option value="cement" <?php if (isset($_POST['color']) && $_POST['color'] == 'cement') { ?>selected <?php }; ?>>Cement</option>
            <option value="golden" <?php if (isset($_POST['color']) && $_POST['color'] == 'golden') { ?>selected <?php }; ?>>Golden</option>
            <option value="white" <?php if (isset($_POST['color']) && $_POST['color'] == 'white') { ?>selected <?php }; ?>>White</option>
            <option value="yellow" <?php if (isset($_POST['color']) && $_POST['color'] == 'yellow') { ?>selected <?php }; ?>>Yellow</option>
        </select>
    </div>
    
    <div>
        <select class="filter" name="category" id="category" onchange="this.form.submit()">
            <option value="" disabled selected hidden>Category</option>
            <option value="blanket" <?php if (isset($_POST['category']) && $_POST['category'] == 'blanket') { ?>selected <?php }; ?>>Blanket</option>
            <option value="chair" <?php if (isset($_POST['category']) && $_POST['category'] == 'chair') { ?>selected= <?php }; ?>>Chair</option>
            <option value="lighting" <?php if (isset($_POST['category']) && $_POST['category'] == 'lighting') { ?>selected= <?php }; ?>>Lighting</option>
            <option value="mirror" <?php if (isset($_POST['category']) && $_POST['category'] == 'mirror') { ?>selected= <?php }; ?>>Mirror</option>
            <option value="storageunit" <?php if (isset($_POST['category']) && $_POST['category'] == 'storageunit') { ?>selected= <?php }; ?>>Storageunit</option>
            <option value="table" <?php if (isset($_POST['category']) && $_POST['category'] == 'table') { ?>selected= <?php }; ?>>Table</option>
        </select>
    </div>
</form>


<div class="range">
        <form action="" method="post">
            <label for="pricerange">Price Range<br/></label>
            <input class="slide-bar" type="range" id="slidebar" name="pricerange" 

            <?php if (empty($_POST['pricerange'])) { ?>
                    value="500"
                <?php } else { ?>
                    value="<?= $_POST['pricerange']?>" <?php ;
                }?>

            min="0" max="1000" step="10" oninput="updateTextInput(this.value);" onchange="this.form.submit()">

            <p class="min-price">$0</p>
            <p class="max-price">$1,000+</p>
            <output type="text" name="output" id="output">
            <?php if (empty($_POST['pricerange'])) { ?>
                    500
                <?php } else {
                    echo $_POST['pricerange'];
                }?>
            </output>
        </form>
    </div>
</div>