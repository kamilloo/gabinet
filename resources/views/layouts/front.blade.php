<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gabinet kosmetyki pielęgnacyjnej Katarzyna Piętka</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700%7CNiconne" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Bootstrap.css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Date pixker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- XS Icon -->
    <link rel="stylesheet" href="css/xs-icon.css">
    <!-- Owl slider -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Isotope -->
    <link rel="stylesheet" href="css/isotope.css">
    <!-- magnific-popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="css/responsive.css" />
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Twoje przeglądarka nie jest aktualna. <a href="http://browsehappy.com/">Zaktualizuj teraz</a> w celu poprawnego wyświetlania strony.</p>
<![endif]-->

<!-- Prelaoder -->
<div id="preloader">
    <div class="preloader-window left-window"></div>
    <div class="preloader-window right-window"></div>
    <div class="preloader-content">
        <img src="img/logo_bez_tla.png" alt="Gabinet Kosmetyki Pielęgnacyjnej Katarzyna Piętka">
    </div>
    <div class="spinner-block">
        <div class="spinner-eff spinner-eff-3">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>
</div>
<!-- Prelaoder end -->

<!-- Main menu -->
<header class="beautypress-header-section beautypress-header-version-2 header-height-calc-minus navbar-fixed">
    <div class="beautypress-header-top bg-color-gray-2">
        <div class="container">
            <div class="beautypress-spilit-container beautypress-version-2">
                <div class="beautypress-language-select-list">
                </div>
                <ul class="beautypress-simple-iocn-list beautypress-version-1">
                    <li><i class="xsicon icon-call"></i>+48 602 139 040</li>
                    <li><i class="xsicon icon-envelope"></i>pietka.kasia3@gmail.com</li>
                </ul>
            </div>
        </div>
    </div><!-- .beautypress-header-top END -->
    <div class="beautypress-new-header color-grren xs-extra-css">
        <div class="container">
            <nav class="xs_nav_2 xs_nav-landscape">
                <div class="nav-header">
                    <a class="nav-logo" href="{{ route('welcome') }}">
                        <img src="img/logo-v4.png" alt="logo">
                    </a>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-search">
                    {{--<div class="nav-cart-button">--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-shopping-basket"></i>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    <div class="nav-search-button">
                        <a href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    <form><span class="nav-search-close-button" tabindex="0">✕</span>
                        <div class="nav-search-inner">
                            <input type="search" name="search" placeholder="Type and hit ENTER">
                        </div>
                    </form>
                </div>
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu nav-menu-centered">
                        <li><a href="{{ route('welcome') }}">Strona Glówna</a>
                        </li>
                        <li><a href="{{ route('about') }}">O mnie</a>
                        </li>
                        <li><a href="{{ route('services') }}">Usługi</a>
                        </li>
                        <li><a href="{{ route('portfolio') }}">portfolio</a>
                        </li>
                        <li><a href="{{ route('pricing') }}">Cennnik</a>

                        </li>
                        <li><a href="{{ route('contact') }}">Kontakt</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-overlay-panel"></div></nav>
        </div>
    </div>
</header><!-- .beautypress-header-section END -->
<!-- Main menu closed -->
@yield('content')

<!-- Footer section -->
<footer class="beautypress-footer-section beautypress-version-4">
    <div class="container">
        <div class="beautypress-footer-wraper">
            <div class="beautypress-footer-content">
                <div class="beautypress-footer-logo">
                    <a href="{{ route('welcome') }}">
                        <img src="img/logo-v4.png" alt="">
                    </a>
                </div><!-- .beautypress-footer-logo END -->
                <p>To wyjątkowe miejsce mieszczące się w Grodzisku Wielkopolskim przy ulicy Mossego 2, którego głównym atutem jest miła i fachowa obsługa doświadczonego i odpowiednio przygotowanego personelu. </p>
                <div class="beautypress-footer-social text-center">
                    <ul class="beautypress-social-list">
                        <li>
                            <a href="https://www.facebook.com/kosmetolog.wlkp/" class="beautypress-facebook"><i class="fa fa-facebook"></i></a></li>
                        {{--<li><a href="" class="beautypress-twitter"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li><a href="" class="beautypress-pinterest"><i class="fa fa-pinterest-p"></i></a></li>--}}
                        {{--<li><a href="" class="beautypress-dribbble"><i class="fa fa-dribbble"></i></a></li>--}}
                        {{--<li><a href="" class="beautypress-instagram"><i class="fa fa-instagram"></i></a></li>--}}
                        {{--<li><a href="" class="beautypress-google-plus"><i class="fa fa-google-plus"></i></a></li>--}}
                    </ul><!-- .beautypress-social-list END -->
                </div>
            </div><!-- .beautypress-footer-content END -->
            <nav class="beautypress-footer-menu">
                <ul>
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="{{ route('about') }}">o nas</a></li>
                    <li><a href="{{ route('services') }}">usługi</a></li>
                    <li><a href="{{ route('portfolio') }}">portfolio</a></li>
                    <li><a href="{{ route('pricing') }}">cennik</a></li>
                    <li><a href="{{ route('contact') }}">kontakt</a></li>
                </ul>
            </nav><!-- .beautypress-footer-menu END -->
        </div><!-- .beautypress-footer-wraper END -->
    </div>
</footer><!-- .beautypress-footer-section END -->
<!-- Footer section end -->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/appear.js"></script>
<script src="js/spectragram.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>
<script src="js/main.js"></script>
</body>
</html>
