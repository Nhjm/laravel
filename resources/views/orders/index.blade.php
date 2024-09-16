@extends('layouts.master')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="d-md-block d-none" style="height: 75px;width: 100%; ">
    </div>
    <div class="breadcumb_area bg-img h-25 blur"
        style="background: url({{ asset('theme/essence-master/img/bg-img/breadcumb.jpg') }}); ">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center ">
                        <h2 class="font-weight-bold fs-40" style="color: black">Thủ tục thanh toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Địa chỉ nhận hàng</h5>
                        </div>

                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Họ<span>*</span></label>
                                    <input name="ho" type="text" class="form-control" id="first_name" value=""
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Tên<span>*</span></label>
                                    <input name="ten" type="text" class="form-control" id="last_name" value=""
                                        required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Địa chỉ<span>*</span></label>
                                    <input name="address" type="text" class="form-control mb-3" id="street_address"
                                        value="">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number">Số điện thoại<span>*</span></label>
                                    <input name="sdt" type="number" class="form-control" id="phone_number"
                                        min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email<span>*</span></label>
                                    <input name="email" type="email" class="form-control" id="email_address"
                                        value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Ghi chú</label>
                                    <input name="note" type="text" class="form-control" id="email_address"
                                        value="">
                                </div>


                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="mx-auto bor19 p-3 p-lr-15-sm voucher">
                        <div class="d-flex justify-content-between mb-2">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                placeholder="Nhập mã giảm giá">
                            <input class="hidden" type="hidden" name="voucher" value="">
                            <div
                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5 btn">
                                Áp dụng
                            </div>
                        </div>
                        <div class="name">

                        </div>
                        <div class="err"></div>
                    </div>
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Thanh toán</h5>

                        </div>

                        <ul class="order-details-form mb-4">
                            {{-- <li><span>Product</span> <span>Total</span></li>
                            <li><span>Cocktail Yellow dress</span> <span>$59.90</span></li>
                            <li><span>Subtotal</span> <span>$59.90</span></li> --}}
                            {{-- <li><span>Tổng số lượng</span> <span>{{ count($cart) }}</span></li> --}}
                            <li><span>Tạm tính</span> <span>{{ number_format($total_price) }}
                                    VNĐ</span></li>
                            <li><span>Phí ship</span> <span>MIỄN PHÍ</span></li>
                            <li>
                                <span>Tổng tiền</span>
                                <span class="text-danger price"
                                    data-price="{{ $total_price }}">{{ number_format($total_price) }}
                                    VNĐ</span>
                            </li>
                            <li><span>CÁCH THỨC THANH TOÁN:</span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="form-check">
                                <div data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    <input class="form-check-input" type="radio" name="thanh_toan" id="exampleRadios1"
                                        value="qr">

                                    <label class="form-check-label" for="exampleRadios1">
                                        Thanh toán QR
                                    </label>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Sử dụng mã QR để chuyển khoản, hệ thống tự động trong 3s</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <div data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <input class="form-check-input" type="radio" name="thanh_toan" id="exampleRadios2"
                                        value="ship">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Khách hàng trả tiền khi nhận hàng thành công
                                    </label>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Khách hàng trả tiền khi nhận hàng thành công</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Thanh toán
                                            QR</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Sử dụng mã QR để chuyển khoản, hệ thống tự động trong 3s</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div>
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>Thanh toán khi
                                            nhận hàng</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Khách hàng trả tiền khi nhận hàng thành công</p>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        <button class="btn essence-btn">Đặt hàng</button>
                    </div>
                </div>
                </form>
            </div>
            <div>
                <div class="cart-page-heading mb-30">
                    <h5>Sản phẩm</h5>
                </div>
                <div class="row">
                    <ul class="header-cart-wrapitem w-full col-md-6">
                        @foreach ($cart as $item)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img image" data-variant_id="13">
                                    <img src="{{ Storage::url($item['image']) }}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{ $item['name'] }}
                                    </a>
                                    <span class="header-cart-item-info">
                                        <span class="text-danger">{{ $item['cart_quantity'] }} x
                                            {{ number_format($item['price_sale']) ?: number_format($item['price_regular']) }}
                                            |
                                            {{ $item['size']['name'] }} |
                                            {{ $item['color']['name'] }}</span>
                                    </span>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <style>
        .breadcumb_area:after {
            background-color: rgba(255, 255, 255, 0.9);
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: -5;
            content: '';
        }

        .breadcumb_area {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 140px;
        }

        .section-padding-80 {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .checkout_details_area form label span {
            color: #0011ff;
        }

        .checkout_details_area form .form-control {
            height: 42px;
            border: 1px solid #a8a8a8;
            background-color: transparent;
            border-radius: 3px;
        }

        .checkout_details_area form .nice-select {
            border-radius: 0;
            border: 1px solid #ebebeb;
        }

        .checkout_details_area form .nice-select .list {
            width: 100%;
            border-radius: 0;
        }

        .order-details-confirmation {
            width: 100%;
            border: 2px solid #ebebeb;
            padding: 40px;
        }

        @media only screen and (max-width: 767px) {
            .order-details-confirmation {
                margin-top: 100px;
                padding: 20px;
            }
        }

        .order-details-confirmation .order-details-form li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -ms-grid-row-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 0;
            font-size: 12px;
            text-transform: uppercase;
            padding: 20px 0;
            border-bottom: 2px solid #ebebeb;
            font-weight: 600;
        }

        .order-details-confirmation .card-header h6 a {
            display: block;
            font-size: 14px;
            text-transform: uppercase;
        }

        .order-details-confirmation .card-header h6 a i {
            color: #9f9f9f;
        }

        .order-details-confirmation .card {
            border: none;
        }

        .order-details-confirmation .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .order-details-confirmation .card-body p {
            font-size: 12px;
            line-height: 2;
            color: #9f9f9f;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #000000;
            line-height: 1.3;
            font-weight: 700;
            font-family: "Ubuntu", sans-serif;
            font-size: 25px;
            margin-bottom: 30px;
        }

        .order-details-confirmation .order-details-form li {
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -ms-grid-row-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 0;
            font-size: 16px;
            text-transform: uppercase;
            padding: 20px 0;
            border-bottom: 2px solid #ebebeb;
            font-weight: 600;
        }

        .checkout_details_area form label {
            /* font-size: 12px; */
            text-transform: uppercase;
            font-weight: 600;
        }

        .essence-btn {
            display: inline-block;
            min-width: 170px;
            height: 50px;
            color: #ffffff;
            border: none;
            border-radius: 0;
            padding: 0 40px;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 50px;
            background-color: #3f2ff1;
            letter-spacing: 1.5px;
            font-weight: 600;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .essence-btn:hover,
        .essence-btn:focus {
            color: #ffffff;
            background-color: #dc0303;
        }
    </style>

    <style>
        /* Các lớp CSS cơ bản cho form từ Bootstrap */
        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-check {
            position: relative;
            display: block;
            padding-left: 1.25rem;
        }

        .form-check-input {
            position: absolute;
            margin-top: .3rem;
            margin-left: -1.25rem;
        }

        .form-check-label {
            margin-bottom: 0;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(38, 143, 255, .25);
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let voucher_use = []
            let total_price = Number($('.order-details-form .price').data(
                'price'))
            let total_price_tmp = total_price

            $('.voucher .btn').on('click', function() {

                let input = $(this).parent().find('input')
                let voucher = input.val().trim()
                console.log(voucher);
                if (voucher === '') {
                    input.focus()
                    return
                }

                $.ajax({
                    type: "GET",
                    url: `{{ route('voucher') }}`,
                    dataType: "json",
                    data: {
                        name: voucher
                    },
                    headers: {
                        Accept: 'application/json', // Chấp nhận dữ liệu JSON
                    },
                    success: function(res) {
                        console.log(res);
                        if (!res.success) {
                            $('.voucher .err').html(`
                            <span class="text-danger">${res.message}</span>
                             `)
                            input.focus()
                            return
                        }
                        $('.voucher .err').empty()

                        // Kiểm tra voucher đã được sử dụng chưa
                        if (voucher_use.includes(res.voucher.name)) {
                            alert('Voucher đã được sử dụng');
                            input.focus()
                        } else {
                            voucher_use.push(res.voucher.name);
                            input.val('')
                            $('.voucher .hidden').val(voucher_use.join(','))

                            let amount = Number(res.voucher.amount)

                            $('.voucher .name').append(`
                            <span class="badge text-bg-primary bg-primary fs-15 p-2 mb-2">${res.voucher.name}</span>
                             `)

                            if (res.voucher.type === 'fixed') {
                                let format_amount = amount.toLocaleString('en-US');

                                let voucher = $(
                                    `<li><span>MÃ GIẢM GIÁ: ${res.voucher.name}</span> <span>-${format_amount} VNĐ</span></li>`
                                )

                                $('.order-details-form .price').parent().before(voucher);

                                $('.order-details-form .price').html(
                                    `${(total_price-=amount).toLocaleString('en-US')} VNĐ`)
                            } else {
                                let voucher = $(
                                    `<li><span>MÃ GIẢM GIÁ: ${res.voucher.name}</span> <span>-${amount} %</span></li>`
                                )

                                $('.order-details-form .price').parent().before(voucher);

                                $('.order-details-form .price').html(
                                    `${(total_price-=(total_price/100*amount)).toLocaleString('en-US')} VNĐ`
                                )

                            }


                        }

                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection
