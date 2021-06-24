<div class="search-bar">        
    <form action="" method="post" name="searchbar">
        <button type="submit" name="submit-search"><img src="../../public/assets/icons/search.png"></button>
        <input class="search" type="search" name="search" placeholder="<?php if(isset($_POST['search'])) {
                echo $_POST['search'];
                } else {
                 echo "living room";
                }?>"
             onfocus="searchBarOn()" onblur="searchBarOff()" onclick="getSearch()">

             <!-- SEND POST SEARCH TO JAVASCRIPT -->
             <input id="hidden" type="hidden" name="hidden"
              value="<?php if(isset($_POST['search'])) {
                 echo $_POST['search'];
                } else {
                    echo "living room";
                }
                  ?>">               
                    
        </form>
        <div class="algolia">
            <img src="../../public/assets/icons/sajari-logo.png" alt="algolia logo">
        </div>
</div>      
<div class="selectdiv">
    <form action="" method="post">
        <select class="filter" name="searchbar-filter" id="searchbar-filter" onchange="this.form.submit()">
            <option value="increasing-price" <?php if (isset($_POST['searchbar-filter']) && $_POST['searchbar-filter'] == 'increasing-price') { ?>selected <?php }; ?>>Increasing price</option>
            <option value="decreasing-price" <?php if (isset($_POST['searchbar-filter']) && $_POST['searchbar-filter'] == 'decreasing-price') { ?>selected <?php }; ?>>Decreasing price</option>
            <option value="alphabetically" <?php if (isset($_POST['searchbar-filter']) && $_POST['searchbar-filter'] == 'alphabetically') { ?>selected <?php }; ?>>Alphabetically</option>
            <option value="reverse-alphabetically" <?php if (isset($_POST['searchbar-filter']) && $_POST['searchbar-filter'] == 'reverse-alphabetically') { ?>selected <?php }; ?>>Reverse alphabetically</option>
        </select>
    </form>
</div>