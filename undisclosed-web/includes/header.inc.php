<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="../images/favicon.ico" type="">

    <title> Undisclosed </title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />

    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/responsive.css" rel="stylesheet" />
</head>

<?php

if (basename($_SERVER['PHP_SELF']) === 'index.php') {
?>


    <body>

        <div class="hero_area">
            <div class="bg-box">
                <img src="../images/hero-bg.jpg" alt="">
            </div>
            <header class="header_section">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.php">
                            <span>
                                Undisclosed
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  mx-auto ">

                            </ul>
                            <div class="user_option">
                                <a href="#" class="user_link" id="emptycart">
                                    <i class="fa fa-trash" aria-hidden="true" style="color: white;"></i>
                                </a>
                                <?php
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                ?>
                                    <a href="/view_cart.php" class="order_online" id="shopbutton">View Cart</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= $_SERVER['PHP_SELF'] ?>#shop" class="order_online" id="shopbutton">Shop Now</a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </nav>
                </div>
            </header>
        <?php
    } else {
        ?>


            <body class="sub_page">

                <div class="hero_area">
                    <div class="bg-box">
                        <img src="../images/hero-bg.jpg" alt="">
                    </div>
                    <header class="header_section">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg custom_nav-container ">
                                <a class="navbar-brand" href="index.php">
                                    <span>
                                        Undisclosed
                                    </span>
                                </a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class=""> </span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav  mx-auto ">
                                    </ul>
                                    <div class="user_option">
                                        <a href="#" class="user_link" id="emptycart">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: white;"></i>
                                        </a>
                                        <?php
                                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                        ?>
                                            <a href="/view_cart.php" class="order_online" id="shopbutton">View Cart</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= $_SERVER['PHP_SELF'] ?>#shop" class="order_online" id="shopbutton">Shop Now</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </header>
                </div>
            <?php
        }

            ?>