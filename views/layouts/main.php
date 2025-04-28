<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\AppAssetsAccount;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAssetsAccount::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>

    <link href="/account-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="/account-dist/css/plugins.css" rel="stylesheet" type="text/css" >
    <link href="/account-dist/css/swiper.css" rel="stylesheet" type="text/css" >
    <link href="/account-dist/css/style.css" rel="stylesheet" type="text/css" >
    <link href="/account-dist/css/coloring.css" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="/account-dist/css/colors/scheme-01.css" rel="stylesheet" type="text/css" >

    <?php $this->head() ?>
</head>
<body class="d-flex flex-column">
<?php $this->beginBody() ?>
<div id="wrapper">
        <!-- <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>
        <div class="scrollbar-v show-on-scroll"></div> -->
        
        <!-- page preloader begin -->
        <div id="de-loader"></div>
        <!-- page preloader close -->

        <header class="transparent header-light" style="background-color: #5a9e7c;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="index.html">
                                        <img class="logo-main" src="/account-dist/images/logo-black.webp" alt="" >
                                        <img class="logo-scroll" src="/account-dist/images/logo-black.webp" alt="" >
                                        <img class="logo-mobile" src="/account-dist/images/logo-black.webp" alt="" >
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="/">Главная</a></li>
                                    <li><a class="menu-item" href="/catalog">Каталог</a></li>
                                    </li>
                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <div class="h-phone sm-hide">
                                        <i class="icofont-headphone-alt"></i>
                                        <span>Need Help?</span>+929 333 9296
                                    </div>                                    
                                    <?= Yii::$app->user->isGuest ? "<a href=\"/site/register\" class=\"btn-main btn-light-trans text-light\">Регистрация</a>" : '' ?>
                                    <?= !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ? "<a href=\"/account\" class=\"btn-main btn-light-trans text-light\">Личный кабинет</a>" : '' ?>  
                                    <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin ? "<a href=\"/admin\" class=\"btn-main btn-light-trans text-light\">Панель админиситратора</a>" : '' ?>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <main id="main" role="main">
        <?= $content?>
    </main>

           
    </div>
        <footer class="footer-light">
            <div class="container relative z-1000">
                <div class="row gx-5">
                    <div class="col-lg-4 col-sm-6" style="flex-wrap: wrap;">
                        <img src="/account-dist/images/logo-black.webp" alt="" >
                        <div class="spacer-20"></div>
                        <p>
                            At Mindthera, we understand that life's challenges<br>
                            can sometimes feel overwhelming, and seeking<br>
                            support can be a daunting step. That's why our<br>
                            team of dedicated therapists is here to provide<br>
                            you with the compassionate guidance and expert<br>care you deserve.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Company</h5>
                                    <ul>                                        
                                        <li><a href="#">Individual Therapy</a></li>
                                        <li><a href="#">Couples Counseling</a></li>
                                        <li><a href="#">Career Counseling</a></li>
                                        <li><a href="#">Stress management</a></li>
                                        <li><a href="#">Anxiety Treatment</a></li>
                                        <li><a href="#">Depression Therapy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Our Services</h5>
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Our Services</a></li>
                                        <li><a href="#">Study Case</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                        <div class="widget">

                            <div class="fw-bold text-dark"><i class="icofont-location-pin me-2 id-color"></i>Office Location</div>
                            100 S Main St, Los Angeles, CA

                            <div class="spacer-20"></div>

                            <div class="fw-bold text-dark"><i class="icofont-envelope me-2 id-color"></i>Send a Message</div>
                            studio-glasses@exemple.com

                            <div class="spacer-20"></div>

                            <div class="social-icons mb-sm-30">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-discord"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter relative z-1000">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    Studio Glasses
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <img src="/account-dist/images/misc/flowers-crop-3.webp" class="w-20 absolute top-0 end-0 sw-anim" alt="">
        </footer>
    </div>


<!-- <main id="main" class="flex-shrink-0" role="main">
    <div class="container">
       
        <?#= Alert::widget() ?>
        <?# $content ?>
    </div>
</main> -->

    <!-- <script src="/account-dist/js/plugins.js"></script> -->
    <!-- <script src="/account-dist/js/designesia.js"></script> -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
