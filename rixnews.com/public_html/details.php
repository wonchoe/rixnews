<?php
date_default_timezone_set("America/Chicago");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbhost = '127.0.0.1';
$dbuser = 'admin_default';
$dbname = 'admin_default';
$dbpass = '987321';
$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$title = 'TenNews - News Agency';
$description = '';
$keywords = '';
$date = addslashes($_GET['date']);
$alias = addslashes($_GET['alias']);
if(is_numeric($alias)) $res = mysqli_query($db,'SELECT * FROM news WHERE id="'.$alias.'"');
else $res = mysqli_query($db,'SELECT * FROM news WHERE date="'.$date.'" and alias="'.$alias.'"');
$newsExist=mysqli_num_rows($res);
 
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$dt=date_create($row['date']);

$source = $row['source'];
if ((strpos('1'.$source,'http')>0) or (strpos('1'.$source,'www')>0))
	{
	$domain = str_replace('www.','',$source);
	$domain = str_replace('http://','',$domain);
	$domain = str_replace('https://','',$domain);
	$domain = str_replace('https://www.','',$domain);
	$domain = str_replace('http://www.','',$domain);
	$domain = substr($domain,0,strpos($domain,'/'));
	$source='<a href='.$source.'>'.$domain.'</a>';
	}

if ($row['description']) $description = $row['description'];
if ($row['title']) $title = $row['title'];
if ($row['keywords']) $keywords = $row['keywords'];
if ($row['content']) $content = $row['content'];
$flink = 'https://'.$_SERVER['HTTP_HOST'].'/'.date_format($dt,'Y/m/d').'/'.$row['id'];
$pic = 'https://'.$_SERVER['HTTP_HOST'].str_replace('_sm.','.',$row['pic']);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?echo $title?> - RIXNews</title>
        <meta name="description" content="<?echo $description;?>">
        <meta name="keywords" content="<?echo $keywords;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="language" content="English (United States), en-US"/>
        <meta name="date" content="<?echo $row['date'].'T'.$row['time'].'Z';?>"/>           
        <meta http-equiv="Content-Language" content="en-US"/>        
        <meta property="og:site_name" content="RIXNews"/>
        <meta property="og:url" content="<?echo $flink;?>"/>
        <meta property="og:title" content="<?echo $title;?>"/>
        <meta property="og:image" content="<?echo $pic;?>"/>
        <meta property="og:description" content="<?echo $description;?>"/>
        <meta property="og:locale" content="en_US"/>
        <meta property="og:type" content="article"/>             
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@rixnews_com">
		<meta name="twitter:creator" content="@rixnews_com">
		<meta name="twitter:title" content="<?echo $title;?>">
		<meta name="twitter:description" content="<?echo $description;?>">
		<meta name="twitter:image" content="<?echo $pic;?>">       
       
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
                            <?
							$res = mysqli_query($db,'SELECT * FROM category');
							while($row = mysqli_fetch_array($res,MYSQLI_BOTH))
							{
							echo '<li class="list-inline-item"><a href="/'.$row['alias'].'">'.$row['name'].'</a></li>';
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
                                <a href="/"><img src="/images/mobile-logo.png" alt="" class="img-fluid"></a>
                                <a href="/"><i class="fa fa-home"></i></a>
                                <ul>
	                            <?
								$res = mysqli_query($db,'SELECT * FROM category');
								while($row = mysqli_fetch_array($res,MYSQLI_BOTH))
								{
								echo '<li class="list-inline-item"><a href="/'.$row['alias'].'">'.$row['name'].'</a></li>';
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




        <!-- All News -->
        <?
        if ($newsExist>0){?>
        <section class="news-details">
            <div class="container">
                <div class="row">
                
              
                    <div class="col-lg-8 col-md-12">
						<div class="news-heading" style="margin-top:30px;">
                            <h4><?echo html_entity_decode($title);?></h4>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item" id="sourcename"></li>
                                <li class="list-inline-item"><i class="fa fa-calendar"></i><?echo date_format($dt, 'F d, Y');?></li>
                            </ul>
                            
                            <?echo html_entity_decode($content);?>
                        </div>
                    </div>                    

                    <div class="col-lg-4 col-md-12">
					<?
					include('templates/followers.php');
					?>
                        
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
                
        <?}else{?>              
        <!-- 404 Error -->
        <section class="error404 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="err-content">
                            <h1>4<span>0</span>4</h1>
                            <h4>Oops...Page Not Found!</h4>
                            <p>We could not found the page you are looking for.</p>
                            <a href="/">GO TO HOMEPAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End 404 Error -->
        <?}?>
        
        
        
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
        <script src="/js/assets/vendor/jquery-1.12.4.min.js"></script>
        
        <!-- Poppers Js -->
        <script src="/js/assets/popper.js"></script>

        <!-- Bootstrap -->
        <script src="/js/assets/bootstrap.min.js"></script>
		
		<!-- Sticky Js -->
        <script src="/js/assets/jquery.sticky.js"></script>

        <!-- WOW JS -->
        <script src="/js/assets/wow.min.js"></script>


        <!-- Smooth Scroll -->
        <script src="/js/assets/smooth-scroll.js"></script>

        <!-- Mean Menu -->
        <script src="/js/assets/jquery.meanmenu.min.js"></script>

        <!-- News Ticker -->
        <script src="/js/assets/jquery.newsticker.min.js"></script>

        <!-- Owl Carousel -->
        <script src="/js/assets/owl.carousel.min.js"></script>

        <!-- Magnific Popup -->
        <script src="/js/assets/jquery.magnific-popup.min.js"></script>

        <!-- Syotimer -->
        <script src="/js/assets/jquery.syotimer.min.js"></script>

        <!-- Custom JS -->
        <script src="/js/plugins.js"></script>
        <script src="/js/custom.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8676629-2"></script>
<script>

$('#sourcename').html('<i class="fa fa-user"></i>'+'<?echo $source?>');

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-8676629-2');
</script>        
    </body>    
</html>        
