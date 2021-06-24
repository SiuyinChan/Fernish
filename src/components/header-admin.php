<header>    
    <?php include_once './src/components/nav-mobile.php'; ?>
    <nav style="background: white">        
        <div class="navbar">
            <a href="/"><img src="../../public/assets/icons/logo.png" alt="LOGO Fernish"></a>
            <p class="logo"><a href="/admin.php"> Admin Panel.</a></p>        
                  
            <div class="nav-right">                

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
    </nav>           
</header>