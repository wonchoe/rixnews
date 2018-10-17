<?php
date_default_timezone_set("America/Chicago");
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ROOT . '/app/core/dbClass.php';
require_once ROOT . '/app/controller/headerController.php';

$title = 'Latest tech news, smartphones reviews and cryptocurency news, american news online, usa - RIXNews';
headerController::showHeader($title);

$dbhost = '127.0.0.1';
$dbuser = 'admin_default';
$dbname = 'admin_default';
$dbpass = '987321';
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$description = '';
$keywords = '';
$advquery = '';
$cat = '';
$menu = '';
if (isset($_GET['cat'])) {
    $cat = addslashes($_GET['cat']);
    $advquery = 'WHERE category=(SELECT id FROM category WHERE alias = "' . $cat . '")';
}

$res = mysqli_query($db, 'SELECT * FROM category');
while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
    $menu = $menu . '<li class="list-inline-item"><a href="/' . $row['alias'] . '">' . $row['name'] . '</a></li>' . "\n";
    if ($row['alias'] == $cat) {
        $title = stripcslashes($row['title']);
        $title = str_replace('$y', date("Y"), $title);
        $description = stripcslashes($row['description']);
        $description = str_replace('$y', date("Y"), $description);
        $keywords = stripcslashes($row['keywords']);
        $keywords = str_replace('$y', date("Y"), $keywords);
    }
}

$sqlquery = 'SELECT *,(SELECT name FROM category WHERE id = news.category) as ct FROM news ' . $advquery . ' ORDER BY id DESC LIMIT 5';
?>


<?
$res = mysqli_query($db,'SELECT *,(SELECT name FROM category WHERE id = news.category) as ct FROM news WHERE main="1" ORDER BY id DESC LIMIT 5');
?>
<!-- Slider Area -->
<section class="slider-area">
    <div class="container">
        <div class="row" style="margin-top:15px">
            <div class="col-lg-8 col-md-12 padding-fix-r">
                <div class="owl-carousel owl-slider">
                    <?
                    for ($i=0;$i<3;$i++)
                    {
                    $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
                    $alias = $row['alias'];
                    $date=date_create($row['date']);
                    $d = date_format($date,"Y/m/d");
                    $link = '/'.$d.'/'.$alias;
                    $date = date_create($row["date"]);	
                    $img = str_replace("_sm.", ".", $row['pic']);														
                    if (strpos($img,'thumbnail')>0) $img = str_replace('thumbnail/','',$img);
                    ?>
                    <div class="slider-content">
                        <img src="<?echo $img;?>" alt="" class="img-fluid img-main">
                        <div class="slider-layer" style="width:100%">
                            <p><a href="<?echo $link;?>"><?echo html_entity_decode($row['title'])?></a></p>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><?echo $row['ct']?></li>
                                <li class="list-inline-item"><?echo date_format($date, 'F d, Y');?></li>
                            </ul>
                        </div>
                    </div>
                    <?
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 slider-fix">
                <?
                for ($i=0;$i<2;$i++)
                {
                $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
                $alias = $row['alias'];
                $date=date_create($row['date']);
                $d = date_format($date,"Y/m/d");
                $link = '/'.$d.'/'.$alias;
                $date = date_create($row["date"]);	
                $img = str_replace("_sm.", ".", $row['pic']);														
                ?>                      

                <div class="slider-sidebar sidebar-o">
                    <img src="<?echo $img;?>" style="width:1000%;height:234px" alt="" class="img-fluid">
                    <div class="sidebar-layer" style="width:100%">
                        <p><a href="<?echo $link;?>"><?echo html_entity_decode($row['title'])?></a></p>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><?echo $row['ct']?></li>
                            <li class="list-inline-item"><?echo date_format($date, 'F d, Y');?></li>
                        </ul>
                    </div>
                </div>
                <?}?>
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
                <section id="newscontent" class="oth-news" style="margin-top:-45px;" data-cat="<?echo $cat;?>">
                    <div class="more-top">
                        <h4>MORE NEWS</h4>
                    </div>
                    <?
                    $res = mysqli_query($db,$sqlquery);
                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                    {
                    $alias = $row['alias'];
                    $date=date_create($row['date']);
                    $d = date_format($date,"Y/m/d");

                    $link = '/'.$d.'/'.$alias;
                    $date = date_create($row["date"]);						
                    $text = preg_replace ('/<[^>]*>/', ' ', html_entity_decode($row['description'])); 
                    ?>
                    <div class="more-content" data-id="<?echo $row['id']?>">
                        <div class="more-img">
                            <a href="<?echo $link;?>"><img src="<?echo $row['pic']?>" alt="" class="img-fluid"></a>
                        </div>
                        <div class="img-content" style="min-height: 150px;">
                            <h6><a href="<?echo $link;?>"><?echo html_entity_decode($row['title']);?></a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><?echo $row['ct']?></li>
                                <li class="list-inline-item"><?echo date_format($date, 'F d, Y');?></li>
                            </ul>
                            <p><?echo substr($text,0,100);?></p>
                        </div>
                    </div>


                    <?
                    }
                    ?>


                </section>
                <div id="preloader" style="text-align:center;margin:20px;"><img class="preloader" src="/images/loading.gif"></div>
                <button id="morenews" type="button" class="btn btn-outline-secondary" style="height: 20px;width: 100%;font-size: 12px;padding: 0;margin-bottom: 20px;">More news ▽</button>


            </div>

            <div class="col-lg-4 col-md-12">
                <?
                include('templates/crypto.php');                    
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

<script>

    $('#preloader').hide();
    function moreNews()
    {
        $('#preloader').show();
        r = document.getElementById('newscontent');
        cat = r.dataset.cat;
        lastId = r.children[r.children.length - 1].dataset.id;
        $.get("morenews.php?lastid=" + lastId + '&cat=' + cat, function (data) {

            r.insertAdjacentHTML("beforeend", data);
            $('#preloader').hide();
        });
    }
    r = document.getElementById('morenews');
    r.addEventListener('click', function ()
    {
        moreNews();
    });
</script>  
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8676629-2"></script>
<script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-8676629-2');
</script>
</body>   
</html>        
