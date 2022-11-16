<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">BOOK-O-RAMA</a>
        </div>
        <ul class="nav navbar-nav">
            <li class='<?php if (isset($page) && $page == "home") {echo "active";}?>'><a href="index.php">Book Inventory</a></li>
        </ul>
        <div class="navbar-header navbar-right">
            <?php
            if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
            {
                echo'<a class="navbar-brand" href="login.php">Login</a>';
            } else {
                echo'<a class="navbar-brand" href="logout.php">Logout</a>';
            }
                ?>
        </div>
    </div>
</nav>