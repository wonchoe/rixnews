<?php
/* Smarty version 3.1.32, created on 2018-06-04 19:40:08
  from '/home/admin/web/cetnews.com/public_html/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b15dbe8155132_00298422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7662ac7e6a49ba2d07dda0070a75b6433211adca' => 
    array (
      0 => '/home/admin/web/cetnews.com/public_html/templates/index.tpl',
      1 => 1528155296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5b15dbe8155132_00298422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '8338108285b15dbe8139ab5_72960306';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>
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

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
