<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menüsor megjelenítése</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home.php">Vissza a főoldalra</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?> >
                    <a href="products.php">Termékek</a>
                </li>
                <li <?php echo $page_title=="Kosár" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                        <?php
                        $cart_count=count($_SESSION['cart_items']);
                        ?>
                        Kosár <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
