<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="/jb_assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/jb_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/jb_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/jb_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/jb_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/jb_assets/css/themify-icons.css">
    <link rel="stylesheet" href="/jb_assets/css/nice-select.css">
    <link rel="stylesheet" href="/jb_assets/css/flaticon.css">
    <link rel="stylesheet" href="/jb_assets/css/gijgo.css">
    <link rel="stylesheet" href="/jb_assets/css/animate.min.css">
    <link rel="stylesheet" href="/jb_assets/css/slicknav.css">

    <link rel="stylesheet" href="/jb_assets/css/style.css">
    <link rel="stylesheet" href="/custom/css/style.css">
    <!-- <link rel="stylesheet" href="/assets/css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<header>
    <div class="header-area">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="/jb_assets/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Главная</a></li>
                                        <li><a href="{{ route('themes') }}">Темы</a></li>
                                        <li><a href="#">Избранное</a></li>
                                        <li><a href="#">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="#">Войти</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->

