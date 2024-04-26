<?php

    session_start();

    define("ADMINURL", "http://localhost:63342/PHPWebshop/admin-panel");
?>

<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo ADMINURL; ?>">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <?php if (isset($_SESSION['adminname'])) : ?>
                <ul class="navbar-nav side-nav" >
                    <li class="nav-item">
                        <a class="nav-link text-white" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/admins.php" style="margin-left: 20px;">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ADMINURL; ?>/products-admins/show-products.php" style="margin-left: 20px;">Products</a>
                    </li>

                </ul>
                <?php endif; ?>

                <ul class="navbar-nav ml-md-auto d-md-flex">
                    <?php if (!isset($_SESSION['adminname'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['adminname']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout-admins.php">Logout</a>

                        </li>

                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">