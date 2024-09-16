@extends('layouts.master')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="d-md-block d-none"
                style="height: 75px;width: 100%; background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7) 100%, transparent 100%); position: absolute; top: 0; left: 0; z-index: 1;">
            </div>
            <div class="slick1">
                @foreach ($sliders as $slider)
                    <div class="item-slick1" style="background-image: url({{ Storage::url($slider->image) }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2"
                                        style="text-shadow: -2px -2px 0 #ffff,  2px -2px 0 #ffff,-2px 2px 0 #ffff,2px 2px 0 #ffff,-2px 0 0 #ffff,2px 0 0 #ffff,0 -2px 0 #ffff,0 2px 0 #ffff; ">
                                        Sản phẩm mới
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1"
                                        style="text-shadow: -2px -2px 0 #ffff,  2px -2px 0 #ffff,-2px 2px 0 #ffff,2px 2px 0 #ffff,-2px 0 0 #ffff,2px 0 0 #ffff,0 -2px 0 #ffff,0 2px 0 #ffff; ">
                                        NEW SEASON
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="product.html"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        MUA NGAY
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('theme/cozastore-master/images/banner-01.jpg') }}" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('theme/cozastore-master/images/banner-02.jpg') }}" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('theme/cozastore-master/images/banner-03.jpg') }}" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Accessories
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    SẢN PHẨM MỚI NHẤT
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                {{-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                        Bag
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                        Shoes
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                        Watches
                    </button>
                </div> --}}

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Popularity
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Average rating
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{-- <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Fashion
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Lifestyle
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Denim
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Streetstyle
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Crafts
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        {{-- <a href="product-detail.html"> --}}
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ Storage::url($product->image) }}" alt="IMG-PRODUCT">

                                <button data-id="{{ $product->id }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    XEM NHANH
                                </button>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    @if ($product->price_sale)
                                        <span class="stext-105 cl3 mb-1"
                                            style="text-decoration: line-through;opacity: 50%;">
                                            {{ number_format($product->price_regular) }} VNĐ
                                        </span>
                                        <span class="stext-105 cl3 text-danger">
                                            {{ number_format($product->price_sale) }} VNĐ
                                        </span>
                                    @else
                                        <span class="stext-105 cl3 text-danger">
                                            {{ number_format($product->price_regular) }} VNĐ
                                        </span>
                                    @endif
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="{{ asset('theme/cozastore-master/images/icons/icon-heart-01.png') }}"
                                            alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('theme/cozastore-master/images/icons/icon-heart-02.png') }}"
                                            alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- </a> --}}
                    </div>
                @endforeach

                {{-- <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('theme/cozastore-master/images/product-02.jpg') }}" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Herschel supply
                                </a>

                                <span class="stext-105 cl3">
                                    $35.31
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04"
                                        src="{{ asset('theme/cozastore-master/images/icons/icon-heart-01.png') }}"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="{{ asset('theme/cozastore-master/images/icons/icon-heart-02.png') }}"
                                        alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .wrap-slick3-dots {
            max-height: 600px;
            /* Chiều cao tối đa của khối chứa điểm điều hướng */
            overflow-y: auto;
            /* Kích hoạt cuộn dọc nếu nội dung vượt quá chiều cao */
            overflow-x: hidden;
            /* Ẩn cuộn ngang nếu không cần thiết */
        }

        .slick3-dots {
            /* display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                flex-direction: column; */
            /* margin-right: 20px; */
        }
    </style>
@endsection

@section('scripts_lib')
    <script>
        $(document).ready(function() {

            let variants = [];

            let all_colors = []
            let all_sizes = []

            // Khi nhấn vào phần tử có lớp .js-show-modal1, mở modal
            $('.js-show-modal1').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id')
                let url = `{{ route('api.product_detail', '') }}/${id}`
                // Gửi request đến server để lấy chi tiết sản phẩm theo id
                // console.log(url);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(res) {
                        variants = res.variants;

                        $('.js-modal1 .name').text(res.product.name);

                        if (res.product.price_sale) {
                            $('.js-modal1 .price_sale').text(res.product.price_sale
                                .toLocaleString(
                                    'en-US') + ' VNĐ');
                            $('.js-modal1 .price_regular').text(res.product.price_regular
                                .toLocaleString(
                                    'en-US') + ' VNĐ');
                        } else {
                            $('.js-modal1 .price_regular').empty()
                            $('.js-modal1 .price_sale').text(res.product.price_regular
                                .toLocaleString(
                                    'en-US') + ' VNĐ');
                        }

                        if (res.product.description) {
                            $('.js-modal1 .description').text(res.product.description)
                        } else if (res.product.material)(
                            $('.js-modal1 .description').text(res.product.material)
                        )

                        if ($('.slick3').hasClass('slick-initialized')) {
                            $('.slick3').slick('unslick');
                        }
                        $('.js-modal1 .image').html('');
                        // console.log($('.js-modal1 .image'));
                        res.galleries.forEach(image => {
                            $('.js-modal1 .image').append(
                                `<div class="item-slick3"
                                data-thumb="{{ Storage::url('${image.image}') }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ Storage::url('${image.image}') }}"
                                        alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="{{ Storage::url('${image.image}') }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>`);
                        });

                        init_slick();

                        // Lấy và loại bỏ trùng lặp màu sắc
                        all_colors = getUniqueValues(variants.map(variant => ({
                            id: variant.color.id,
                            name: variant.color.name
                        })), 'id');

                        // Lấy và loại bỏ trùng lặp kích thước
                        all_sizes = getUniqueValues(variants.map(variant => ({
                            id: variant.size.id,
                            name: variant.size.name
                        })), 'id');

                        all_sizes_colors()
                        $('.js-modal1 #add_cart').attr('data-product', `${res.product.id}`);

                        console.log($('.js-modal1 #add_cart').attr('data-product'));

                        $('.js-modal1').addClass('show-modal1');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });

                // $('.js-modal1').addClass('show-modal1');

            });

            // Khi nhấn vào phần tử có lớp .js-hide-modal1, đóng modal
            $('.js-hide-modal1').on('click', function() {
                $('.js-modal1').removeClass('show-modal1');

                $('.js-modal1 .image').html('');
                if ($('.slick3').hasClass('slick-initialized')) {
                    $('.slick3').slick('unslick');
                }
            });

            function all_sizes_colors() {
                $('.js-modal1 .sizes').html(
                    `<option value=''>Chọn kích thước</option>`);
                all_sizes.forEach(size => {
                    $('.js-modal1 .sizes').append(
                        `<option value="${size.id}">${size.name}</option>`);
                });

                $('.js-modal1 .colors').html(`<option value=''>Chọn màu sắc</option>`);
                all_colors.forEach(color => {
                    $('.js-modal1 .colors').append(
                        `<option value="${color.id}">${color.name}</option>`
                    );
                });

                displayQuantity()
            }

            // Function to remove duplicates
            function getUniqueValues(arr, key) {
                return [...new Map(arr.map(item => [item[key], item])).values()];
            }

            // Hàm cập nhật danh sách màu sắc dựa trên kích thước đã chọn
            function updateColors(selectedSizeId) {
                if ($('.js-modal1 .colors').val()) return; // Nếu đã có màu được chọn thì không cập nhật lại

                const filteredColors = variants
                    .filter(variant => variant.product_size_id == selectedSizeId)
                    .map(variant => ({
                        id: variant.color.id,
                        name: variant.color.name,
                        quantity: variant.quantity
                    }));

                // Loại bỏ các màu trùng lặp
                const uniqueColors = getUniqueValues(filteredColors, 'id');

                // Cập nhật dropdown màu sắc
                $('.js-modal1 .colors').html(`<option value=''>Chọn màu sắc</option>`);
                uniqueColors.forEach(color => {
                    $('.js-modal1 .colors').append(
                        `<option value="${color.id}">${color.name}</option>`
                    );
                });
            }

            // Hàm cập nhật danh sách kích thước dựa trên màu sắc đã chọn
            function updateSizes(selectedColorId) {
                if ($('.js-modal1 .sizes').val()) return; // Nếu đã có kích thước được chọn thì không cập nhật lại

                const filteredSizes = variants
                    .filter(variant => variant.product_color_id == selectedColorId)
                    .map(variant => ({
                        id: variant.size.id,
                        name: variant.size.name,
                        quantity: variant.quantity
                    }));

                // Loại bỏ các kích thước trùng lặp
                const uniqueSizes = getUniqueValues(filteredSizes, 'id');

                // Cập nhật dropdown kích thước
                $('.js-modal1 .sizes').html(`<option value=''>Chọn kích thước</option>`);
                uniqueSizes.forEach(size => {
                    $('.js-modal1 .sizes').append(
                        `<option value="${size.id}">${size.name}</option>`
                    );
                });

            }

            // Hàm hiển thị số lượng của biến thể được chọn
            function displayQuantity(selectedSizeId = null, selectedColorId = null) {
                const selectedVariant = variants.find(variant =>
                    variant.product_size_id == selectedSizeId && variant.product_color_id == selectedColorId
                );

                // console.log(selectedVariant);

                if (selectedVariant) {
                    $('.js-modal1 .quantity').html(
                        `<div>Còn lại: <span>${selectedVariant.quantity}</span> sản phẩm</div>`);

                    $('.js-modal1 .input_quantity').html(`
                        <div class="flex-m respon6-next">
                            <div class="size-203 flex-c-m respon6">
                                Số lượng
                            </div>
                            <div class="wrap-num-product flex-w m-r-20 m-tb-20 ">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>
                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                name="quantity" min="1" max="${selectedVariant.quantity}" value="1">
                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>`);

                    $('.btn-num-product-down').on('click', function() {
                        var numProduct = Number($(this).next().val());
                        if (numProduct > 1) $(this).next().val(numProduct - 1);
                    });

                    $('.btn-num-product-up').on('click', function() {
                        var numProduct = Number($(this).prev().val());
                        if (numProduct < selectedVariant.quantity) $(this).prev().val(numProduct + 1);
                    });
                } else {
                    $('.js-modal1 .quantity').text('');
                    $('.js-modal1 .input_quantity').html('')
                }
            }

            // Xử lý sự kiện thay đổi kích thước
            $('.js-modal1 .sizes').change(function() {
                const selectedSizeId = $(this).val();
                const selectedColorId = $('.js-modal1 .colors').val();
                // console.log(selectedSizeId);
                if (selectedSizeId === '') {
                    all_sizes_colors()
                    // console.log(selectedSizeId);
                } else {
                    updateSizes(selectedSizeId);
                    if (selectedColorId) {
                        displayQuantity(selectedSizeId, selectedColorId);
                    }
                }
            });

            // Xử lý sự kiện thay đổi màu sắc
            $('.js-modal1 .colors').change(function() {
                const selectedColorId = $(this).val();
                const selectedSizeId = $('.js-modal1 .sizes').val();

                if (selectedColorId === '') {
                    all_sizes_colors()
                } else {
                    updateSizes(selectedColorId);
                    if (selectedSizeId) {
                        displayQuantity(selectedSizeId, selectedColorId);
                    }
                }
            });

        });
    </script>
@endsection
