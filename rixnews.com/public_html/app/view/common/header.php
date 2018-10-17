<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?echo $title?></title>
        <meta name="description" content="<?echo $description;?>">
        <meta name="keywords" content="<?echo $keywords;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="/css/assets/bootstrap.min.css">

        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="/css/assets/font-awesome.min.css">

        <!-- Animate CSS -->
        <link rel="stylesheet" href="/css/assets/animate.css">

        <!-- Mean Menu -->
        <link rel="stylesheet" href="/css/assets/meanmenu.min.css">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="/css/assets/owl.carousel.min.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="/css/assets/magnific-popup.css">

        <!-- Custom Style -->
        <link rel="stylesheet" href="/css/assets/normalize.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/assets/responsive.css">

    </head>
    <body>
        <!-- Pre-Loader -->
        <div id="page-preloader"><span class="spinner"></span></div>
        <!-- End Pre-Loader -->

        <!-- Top Bar -->
        <section class="top-bar">
            <div class="container">
                <div class="bar-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bar-left">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fa fa-calendar-check-o"></i><?echo $today = date("D, F j, Y");?></li>
                                    <li class="list-inline-item"><i class="fa fa-cloud"></i>New York, 19°C</li>
                                    <li class="list-inline-item"><a href="">Advertise</a></li>
                                    <li class="list-inline-item"><a href="">Write Us</a></li>
                                    <li class="list-inline-item"><a href="">About</a></li>
                                    <li class="list-inline-item"><a href="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bar-social text-right">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-rss"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-youtube"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Top Bar -->

        <!-- Logo Area -->
        <section class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo">
                            <a href="/"><img src="/images/logo2.png" alt="" style="height:87px;" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="searchbar text-right" style="margin-top:25px;">
                            <form action="#">
                                <input placeholder="Search Here" type="text" required="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Area -->

        <!-- Menu Area -->
        <section class="menu-area">
            <div class="container">
                <div class="menu-content">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <ul class="list-unstyled list-inline">
                                <?php
                                foreach ($menu as $row) {
                                    echo '<li class="list-inline-item"><a href="/' . $row['alias'] . '">' . $row['name'] . '</a></li>' . "\n";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <div class="clock text-right">
                                <span id="dg-clock"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Menu Area -->

        <!-- Mobile Menu -->
        <section class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <a href=""><img src="/images/mobile-logo.png" alt="" class="img-fluid"></a>
                                <a href="/"><i class="fa fa-home"></i></a>
                                <ul>
                                    <?php
                                    foreach ($menu as $row) {
                                        echo '<li class="list-inline-item"><a href="/' . $row['alias'] . '">' . $row['name'] . '</a></li>' . "\n";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Mobile Menu -->