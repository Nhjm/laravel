<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- sử dụng cho cloudfare, buộc phải https --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @yield('styles_lib')
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('theme/cozastore-master/images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cozastore-master/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cozastore-master/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cozastore-master/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme/cozastore-master/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cozastore-master/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cozastore-master/css/main.css') }}">
    <!--===============================================================================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        /* Add your custom styles here */
        html {
            font-family: "Roboto", sans-serif;
        }
    </style>

    @yield('style')
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>
                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button>log</button>
                        </form> --}}
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="{{ asset('theme/cozastore-master/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{ route('index') }}">Trang chủ</a>
                                {{-- <ul class="sub-menu">
                                    <li><a href="index.html">Homepage 1</a></li>
                                    <li><a href="home-02.html">Homepage 2</a></li>
                                    <li><a href="home-03.html">Homepage 3</a></li>
                                </ul> --}}
                            </li>

                            <li class="label1" data-label1="hot">
                                <a href="product.html">Danh mục</a>
                                <ul class="sub-menu">
                                    @foreach ($catalogues as $catalogue)
                                        @include('components.catalogue', ['catalogue' => $catalogue])
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href="blog.html">Blog</a>
                            </li>

                            <li>
                                <a href="about.html">About</a>
                            </li>

                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        @if (!Route::is('order.index'))
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                                data-notify="0">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        @endif
                        <a href="#"
                            class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('theme/cozastore-master/images/icons/logo-01.png') }}"
                        alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                @if (!Route::is('order.index'))
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                        data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                @endif

                <a href="#"
                    class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            EN
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            USD
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.html">Trang chủ</a>
                    {{-- <ul class="sub-menu-m">
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span> --}}
                </li>

                <li>
                    <a href="product.html">Shop</a>
                </li>

                <li>
                    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
                </li>

                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ asset('theme/cozastore-master/images/icons/icon-close2.png') }}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Giỏ hàng
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">

            </div>
        </div>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
                        on (+1) 96 716 6879
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="{{ asset('theme/cozastore-master/images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('theme/cozastore-master/images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('theme/cozastore-master/images/icons/icon-pay-03.png') }}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('theme/cozastore-master/images/icons/icon-pay-04.png') }}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('theme/cozastore-master/images/icons/icon-pay-05.png') }}" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        // document.write(new Date().getFullYear());
                    </script> All rights reserved | Made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp;
                    distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ asset('theme/cozastore-master/images/icons/icon-close.png') }}" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb image">

                                    <div class="item-slick3"
                                        data-thumb="{{ asset('theme/cozastore-master/images/product-detail-01.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('theme/cozastore-master/images/product-detail-01.jpg') }}"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ asset('theme/cozastore-master/images/product-detail-01.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <form id="form_product_detail">
                            @csrf
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
                                <h4 class="mtext-105 cl2 js-name-detail p-b-14 name">
                                    Lightweight Jacket
                                </h4>

                                <div class="mtext-106 cl2 price_regular"
                                    style="text-decoration: line-through; opacity: 50%;">
                                    $58.79
                                </div>

                                <span class="mtext-106 cl2 price_sale text-danger">

                                </span>

                                <p class="stext-102 cl3 p-t-23 description" style="white-space: break-spaces;">
                                    Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris
                                    consequat
                                    ornare feugiat.
                                </p>

                                <!--  -->
                                <div class="p-t-33">
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2 sizes" name="size">
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Color
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2 colors" name="color">
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10 quantity">

                                    </div>
                                    <div class="p-b-10 input_quantity">

                                    </div>
                                    <div class="text text-danger error text-center mb-3"></div>
                                </div>
                                <button id="add_cart" style="width: 100%;"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                            </div>
                        </form>

                        <!--  -->
                        {{-- <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('theme/cozastore-master/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('theme/cozastore-master/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('theme/cozastore-master/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        // $('.js-addcart-detail').each(function() {
        //     var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        //     $(this).on('click', function() {
        //         swal(nameProduct, "is added to cart !", "success");
        //     });
        // });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('theme/cozastore-master/js/main.js') }}"></script>

    @yield('scripts_lib')

    <script>
        $(document).ready(function() {
            cart()

            $('#form_product_detail #add_cart').click(function(e) {
                e.preventDefault();

                const form = new FormData(document.querySelector('#form_product_detail'))

                for (const [key, value] of form.entries()) {
                    if (key === 'quantity' || key === 'size' || key === 'color') {
                        if (!value || Number(value) <= 0) {
                            $('#form_product_detail .error').text(`Vui lòng chọn ${key}`);
                            return
                        }
                        $('#form_product_detail .error').text(``);
                    }
                }

                let id = $(this).attr('data-product')
                let url = `{{ route('api.add_cart', '') }}/${id}`

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    contentType: false,
                    processData: false,
                    headers: {
                        Accept: 'application/json' // Chấp nhận dữ liệu JSON
                    },
                    success: function(res) {
                        console.log(res);
                        cart()

                        $('.js-addcart-detail').each(function() {
                            var nameProduct = $(this).parent().parent().parent()
                                .parent().find('.js-name-detail').html();

                            swal(nameProduct, "đã được thêm vào giỏ hàng !",
                                "success");

                        });
                    },
                    errors: function(err) {
                        console.log(err);
                    }
                });
            });

            $('.js-show-cart').on('click', function() {
                cart();
                $('.js-panel-cart').addClass('show-header-cart');
            });

            $('.js-hide-cart').on('click', function() {
                $('.js-panel-cart').removeClass('show-header-cart');
            });

            function quantity_cart(value = null) {
                $('.js-show-cart').attr('data-notify', value)
            }

            function cart() {
                let url = "{{ route('api.cart') }}"

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    headers: {
                        Accept: 'application/json', // Chấp nhận dữ liệu JSON
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF
                    },
                    success: function(res) {
                        // console.log(res.cart);

                        quantity_cart(Object.keys(res.cart).length)

                        if (Object.keys(res.cart).length === 0) {
                            $('.js-panel-cart .header-cart-content').empty()
                            $('.js-panel-cart .header-cart-content').append(`
                                <img class="w-100" src="{{ asset('images/empty-cart.png') }}" alt="">
                                <div class="mx-auto fs-30 font-weight-bold">Giỏ hàng trống</div>
                            `)
                            return
                        }

                        $('.js-panel-cart .header-cart-content').html(`
                            <ul class="header-cart-wrapitem w-full"></ul>
                            <div class="w-full">
                                <div class="header-cart-total w-full p-tb-40">
                                    Tổng tiền: <span class="price text-danger font-weight-bold"></span> VNĐ
                                </div>

                                <div class="header-cart-buttons flex-w w-full">
                                    <a href="shoping-cart.html"
                                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                        Giỏ hàng
                                    </a>

                                    <a href="{{ route('order.index') }}"
                                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                        Thanh toán
                                    </a>
                                </div>
                            </div>`)

                        $('.js-panel-cart ul').empty();

                        Object.values(res.cart).forEach(variant => {
                            // console.log(variant);
                            let price_sale = variant.price_sale ? variant.price_sale
                                .toLocaleString(
                                    'en-US') : null
                            let price_regular = variant.price_regular.toLocaleString(
                                'en-US')

                            $('.js-panel-cart ul').append(`
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <div class="header-cart-item-img image" data-variant_id = "${variant.id}">
                                        <img src="{{ Storage::url('${variant.image}') }}" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt p-t-8">
                                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            ${variant.name}
                                        </a>
                                        <span class="header-cart-item-info">
                                            <span class="text-danger">${variant.cart_quantity} x ${price_sale ?? price_regular} | ${variant.size.name} | ${variant.color.name}</span>
                                        </span>
                                    </div>
                                </li>`);

                        });



                        $('.js-panel-cart .price').text(res.total_price.toLocaleString(
                            'en-US'))

                        // $('.js-panel-cart').addClass('show-header-cart');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            $(document).on('click', '.js-panel-cart .image', function(e) {
                e.preventDefault();

                console.log($(this));

                let id = $(this).data('variant_id');
                let url = `{{ route('api.destroy_cart', '') }}/${id}`;

                $.ajax({
                    type: "DELETE",
                    url: url,
                    dataType: "json",
                    headers: {
                        Accept: 'application/json', // Chấp nhận dữ liệu JSON
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF
                    },
                    success: function(res) {
                        console.log(res);
                        cart();
                    },
                    errors: function(err) {
                        console.log(err);
                    }
                });

            });

        });
    </script>
    @yield('script')
</body>

</html>
