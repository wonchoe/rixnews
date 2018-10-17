<?php
/* Smarty version 3.1.32, created on 2018-06-05 12:47:37
  from '/home/admin/web/cetnews.com/public_html/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b16ccb95ec862_36464338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7662ac7e6a49ba2d07dda0070a75b6433211adca' => 
    array (
      0 => '/home/admin/web/cetnews.com/public_html/templates/index.tpl',
      1 => 1528155296,
      2 => 'file',
    ),
    '895788adaac862585844020117cd2d0e12d65abc' => 
    array (
      0 => '/home/admin/web/cetnews.com/public_html/templates/header.tpl',
      1 => 1526501041,
      2 => 'file',
    ),
    '9cb79fb39f9f23cf51e7c7be471c404974e74401' => 
    array (
      0 => '/home/admin/web/cetnews.com/public_html/templates/footer.tpl',
      1 => 1526501038,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5b16ccb95ec862_36464338 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>TenNews - News Agency</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/assets/bootstrap.min.css">

        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="css/assets/font-awesome.min.css">

        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/assets/animate.css">

        <!-- Mean Menu -->
        <link rel="stylesheet" href="css/assets/meanmenu.min.css">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/assets/owl.carousel.min.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/assets/magnific-popup.css">

        <!-- Custom Style -->
        <link rel="stylesheet" href="css/assets/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/assets/responsive.css">

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
                                    <li class="list-inline-item"><i class="fa fa-calendar-check-o"></i>Sunday, Sep 24, 2017</li>
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
                            <a href=""><img src="images/logo.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="searchbar text-right">
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
                                <li class="list-inline-item"><a href="">WORLD</a></li>
                                <li class="list-inline-item"><a href="">HEALTH</a></li>
                                <li class="list-inline-item"><a href="">TECHNOLOGY</a></li>
                                <li class="list-inline-item"><a href="">POLITICS</a></li>
                                <li class="list-inline-item"><a href="">SPORTS</a></li>
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
                                <a href=""><img src="images/mobile-logo.png" alt="" class="img-fluid"></a>
                                <a href=""><i class="fa fa-home"></i></a>
                                <ul>
                                    <li class="list-inline-item"><a href="index.html">HOME</a></li>
                                    <li class="list-inline-item"><a href="">PAGES</a>
                                        <ul class="list-unstyled">
                                            <li><a href="index.html">HOME</a></li>
                                            <li><a href="about.html">ABOUT</a></li>
                                            <li><a href="">CATAGORY</a>
                                                <ul>
                                                    <li><a href="catagory-one.html">CATAGORY ONE</a></li>
                                                    <li><a href="catagory-two.html">CATAGORY TWO</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="">NEWS DETAILS</a>
                                                <ul>
                                                    <li><a href="news-details-one.html">NEWS DETAILS ONE</a></li>
                                                    <li><a href="news-details-two.html">NEWS DETAILS TWO</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">CONTACT</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="coming-soon.html">COMING_SOON</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="list-inline-item"><a href="">WORLD</a></li>
                                    <li class="list-inline-item"><a href="">HEALTH</a></li>
                                    <li class="list-inline-item"><a href="">TECHNOLOGY</a></li>
                                    <li class="list-inline-item"><a href="">POLITICS</a></li>
                                    <li class="list-inline-item"><a href="">SPORTS</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Mobile Menu -->


        <!-- Slider Area -->
        <section class="slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 padding-fix-r">
                        <div class="owl-carousel owl-slider">
                            <div class="slider-content">
                                <img src="images/slider-1.jpg" alt="" class="img-fluid">
                                <div class="slider-layer">
                                    <p><a href="">This handout will help you understand how paragraphs are formed. It is usually composed of several sentences that together develop one.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item">SPORTS</li>
                                        <li class="list-inline-item">September 24, 2017</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="slider-content">
                                <img src="images/slider-2.jpg" alt="" class="img-fluid">
                                <div class="slider-layer">
                                    <p><a href="">The purpose of this handout is to give some basic instruction. It is usually composed of several sentences that together develop one.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item">LIFE STYLE</li>
                                        <li class="list-inline-item">September 24, 2017</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="slider-content">
                                <img src="images/slider-3.jpg" alt="" class="img-fluid">
                                <div class="slider-layer">
                                    <p><a href="">It is usually composed of several sentences that together develop one. It is usually composed of several sentences that together develop one.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item">FOOD</li>
                                        <li class="list-inline-item">September 24, 2017</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 slider-fix">
                        <div class="slider-sidebar sidebar-o">
                            <img src="images/tech.jpg" alt="" class="img-fluid">
                            <div class="sidebar-layer">
                                <p><a href="">It is usually composed of several sentences that together develop one.</a></p>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">TECHNOLOGY</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                            </div>
                        </div>
                        <div class="slider-sidebar">
                            <img src="images/health.jpg" alt="" class="img-fluid">
                            <div class="sidebar-layer">
                                <p><a href="">These sentences are selected from various online news.</a></p>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">HEALTH</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Slider Area -->

        <!-- All News -->
        <section class="allnews">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                    <section class="oth-news" style="margin-top:-45px;">
                       <div class="more-top">
                            <h4>MORE NEWS</h4>
                        </div>
                        <div class="more-content">
                            <div class="more-img">
                                <a href=""><img src="images/more-1.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="img-content">
                                <h6><a href="">It is usually composed of several sentences that together develop one.</a></h6>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">FAMILY</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi debitis suscipit nesciunt nihil deleniti dolorum reiciendis aspernatur recusandae in......</p>
                            </div>
                        </div>
                        <div class="more-content">
                            <div class="more-img">
                                <a href=""><img src="images/more-1.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="img-content">
                                <h6><a href="">It is usually composed of several sentences that together develop one.</a></h6>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">FAMILY</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi debitis suscipit nesciunt nihil deleniti dolorum reiciendis aspernatur recusandae in......</p>
                            </div>
                        </div>
                        <div class="more-content">
                            <div class="more-img">
                                <a href=""><img src="images/more-1.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="img-content">
                                <h6><a href="">It is usually composed of several sentences that together develop one.</a></h6>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">FAMILY</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi debitis suscipit nesciunt nihil deleniti dolorum reiciendis aspernatur recusandae in......</p>
                            </div>
                        </div>
                        <div class="more-content">
                            <div class="more-img">
                                <a href=""><img src="images/more-1.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="img-content">
                                <h6><a href="">It is usually composed of several sentences that together develop one.</a></h6>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">FAMILY</li>
                                    <li class="list-inline-item">September 24, 2017</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi debitis suscipit nesciunt nihil deleniti dolorum reiciendis aspernatur recusandae in......</p>
                            </div>
                        </div>                                                                        
					</section>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="follow-widget">
                            <h4>FOLLOW US</h4>
                            <ul class="list-unstyled clearfix">
                                <li>
                                    <a href="">
                                        <i class="fa fa-facebook"></i>
                                        <p><span>44,410</span>fans</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-twitter"></i>
                                        <p><span>31,219</span>subscriber</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-rss"></i>
                                        <p><span>11,209</span>subscriber</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-linkedin"></i>
                                        <p><span>19,323</span>follower</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-google-plus"></i>
                                        <p><span>29,559</span>follower</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-youtube"></i>
                                        <p><span>56,717</span>subscriber</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                         <section class="oth-news">
                         <div class="tag-widget">
                            <h4>TAG LIST</h4>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="">News</a></li>
                                <li class="list-inline-item"><a href="">Article</a></li>
                                <li class="list-inline-item"><a href="">Online</a></li>
                                <li class="list-inline-item"><a href="">Tags</a></li>
                                <li class="list-inline-item"><a href="">World</a></li>
                                <li class="list-inline-item"><a href="">Google</a></li>
                                <li class="list-inline-item"><a href="">Wordpress</a></li>
                                <li class="list-inline-item"><a href="">National</a></li>
                                <li class="list-inline-item"><a href="">Food</a></li>
                                <li class="list-inline-item"><a href="">Health</a></li>
                                <li class="list-inline-item"><a href="">News</a></li>
                                <li class="list-inline-item"><a href="">Article</a></li>
                                <li class="list-inline-item"><a href="">Online</a></li>
                                <li class="list-inline-item"><a href="">Tags</a></li>
                                <li class="list-inline-item"><a href="">World</a></li>
                                <li class="list-inline-item"><a href="">Google</a></li>
                                <li class="list-inline-item"><a href="">Wordpress</a></li>
                                <li class="list-inline-item"><a href="">National</a></li>
                            </ul>
                        </div>
						</section>
                    </div>
                </div>
            </div>
        </section>
        <!-- End All News -->

        <!-- Footer --> 
        <footer>
            <div class="container">
                <div class="footer-c">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-about">
                                <h4>ABOUT</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ex, ea. Mollitia consequuntur dolorum cum sed ea cupiditate nisi in quis animi. Accusantium magni impedit, magnam! Similique cumque labore illum.</p>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-link">
                                <h4>ADDITIONAL</h4>
                                <ul class="list-unstyled">
                                    <li><a href=""><i class="fa fa-caret-right"></i>Become A Member</a></li>
                                    <li><a href=""><i class="fa fa-caret-right"></i>Legal Agreement</a></li>
                                    <li><a href=""><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
                                    <li><a href=""><i class="fa fa-caret-right"></i>Terms & Condition</a></li>
                                    <li><a href=""><i class="fa fa-caret-right"></i>Work For Us</a></li>
                                    <li><a href=""><i class="fa fa-caret-right"></i>Newsletter Signup</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="footer-twitter">
                                <h4>TWITTER</h4>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="">https://bh.com/</a></li>
                                    <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="">https://bh.com/</a></li>
                                    <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="">https://bh.com/</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2017 <a href="">TenNews</a>. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="designer-text text-right">
                                <p>Designed With <i class="fa fa-heart"></i> By <a href="">SnazzyTheme</a></p>
                            </div>
                            <div class="back-to-top">
                                <i class="fa fa-angle-double-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->         		
        
        <!-- =========================================
        JavaScript Files
        ========================================== -->

        <!-- jQuery JS -->
        <script src="js/assets/vendor/jquery-1.12.4.min.js"></script>
        
        <!-- Poppers Js -->
        <script src="js/assets/popper.js"></script>

        <!-- Bootstrap -->
        <script src="js/assets/bootstrap.min.js"></script>
		
		<!-- Sticky Js -->
        <script src="js/assets/jquery.sticky.js"></script>

        <!-- WOW JS -->
        <script src="js/assets/wow.min.js"></script>

        <!-- Smooth Scroll -->
        <script src="js/assets/smooth-scroll.js"></script>

        <!-- Mean Menu -->
        <script src="js/assets/jquery.meanmenu.min.js"></script>

        <!-- News Ticker -->
        <script src="js/assets/jquery.newsticker.min.js"></script>

        <!-- Owl Carousel -->
        <script src="js/assets/owl.carousel.min.js"></script>

        <!-- Magnific Popup -->
        <script src="js/assets/jquery.magnific-popup.min.js"></script>

        <!-- Syotimer -->
        <script src="js/assets/jquery.syotimer.min.js"></script>

        <!-- Custom JS -->
        <script src="js/plugins.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>        <?php }
}
