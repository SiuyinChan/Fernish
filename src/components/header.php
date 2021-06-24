<header>
    <?php include_once 'nav-mobile.php'; ?>
    <nav>        
        <div class="navbar">
            <img src="../../public/assets/icons/logo.png" alt="LOGO Fernish">
            <p class="logo"><a href="/">Fernish.</a></p>        
            <ul>
                <li><a href="/">HOME</a></li>
                <!-- NOT IMPLEMENTED -->
                <li><a href="/">MAGAZINE</a></li>
                <li><a href="/">ABOUT US</a></li>
            </ul>        
            <div class="nav-right">
                <a href="#" class="cart"><img src="../../public/assets/icons/cart.svg" alt="cart logo"></a>

                <?php
                
                if (isset($_SESSION["username"])) {
                    echo $_SESSION['username']. "<a href='../../includes/logout.inc.php' class='login'>LOGOUT</a>";
                }
                else {
                    echo "<a href='../../signin.php' class='login'>LOGIN</a>";
                }

                ?>

            </div>
        </div>

        <div class="navbar-mobile">
            <img class="btn-menu" src="../../public/assets/icons/logo.png" alt="LOGO Fernish" onclick="openMenu()">
            <p class="logo"><a href="/">Fernish.</a></p>    
        
            <div class="nav-right">
            <a href="#" class="cart"><img src="../../public/assets/icons/cart.svg" alt="cart logo"></a>
            </div>
        </div>        
    </nav>           
</header>