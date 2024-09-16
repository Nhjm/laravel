<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Hóa đơn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bill/main/assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('bill/main/assets/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('bill/main/assets/img/favicon.ico') }}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bill/main/assets/css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
</head>

<body>

    <!-- Invoice 3 start -->
    <div class="invoice-3 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-name">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <img src="{{ asset('bill/main/assets/img/logos/logo.png') }}"
                                                    alt="logo">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice">
                                            <h1 class="text-end inv-header-1 mb-0">MÃ ĐƠN HÀNG: {{ $order->id }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1">Gửi từ</h4>
                                            <p class="invo-addr-1 mb-0">
                                                Shop Quần Áo <br />
                                                hethongg@gmail.com <br />
                                                Xuân Phương, Nam Từ Liêm, Hà Nội <br />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-30">
                                        <div class="invoice-number text-end">
                                            <h4 class="inv-title-1">Thông tin nhận hàng</h4>
                                            <p class="invo-addr-1 mb-0">
                                                {{ $order->user_name }} <br />
                                                {{ $order->user_email }}<br />
                                                {{ $order->user_address }}<br />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-30">
                                        <h4 class="inv-title-1">Date</h4>
                                        <p class="inv-from-1 mb-0">{{ $order->created_at }}</p>
                                    </div>
                                    <div class="col-sm-6 text-end mb-30">
                                        <h4 class="inv-title-1">Trạng thái thanh toán</h4>
                                        <p class="inv-from-1 mb-0">
                                            @foreach ($status_payment as $key => $name)
                                                @if ($order->status_payment == $key)
                                                    {{ $name }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <h4>Sản phẩm</h4>
                                    <div class="table-outer">
                                        <table class="default-table invoice-table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>MÃ SẢN PHẨM</th>
                                                    <th>TÊN SẢN PHẨM</th>
                                                    {{-- <th>KÍCH THƯỚC</th> --}}
                                                    {{-- <th>MÀU SẮC</th> --}}
                                                    <th>CHI TIẾT</th>
                                                    <th>VAT</th>
                                                    <th>GIÁ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->order_items as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->sku }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        {{-- <td>{{ $item->variant_size_name }}</td> --}}
                                                        {{-- <td>{{ $item->variant_color_name }}</td> --}}
                                                        <td>{{ $item->quantity . ' | ' . $item->variant_size_name . ' | ' . $item->variant_color_name }}
                                                        </td>
                                                        <td>0</td>
                                                        <td>{{ number_format($item->price_sale) ?: number_format($item->price_regular) }}
                                                            VNĐ
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td><strong>TỔNG TIỀN</strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>{{ number_format($order->total_price) }} VNĐ</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="important-note mb-30">
                                            <h3 class="inv-title-1">Important Note</h3>
                                            <ul class="important-notes-list-1">
                                                <li>Once order done, money can't refund</li>
                                                <li>Delivery might delay due to some external dependency</li>
                                                <li>This is computer generated invoice and physical signature does not
                                                    require.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-offsite">
                                        <div class="text-end payment-info mb-30">
                                            <h3 class="inv-title-1">Payment Info</h3>
                                            <p class="mb-0 text-13">This payment made by BRAC BANK master card without
                                                any problem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                <i class="fa fa-print"></i> In hóa đơn
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                                <i class="fa fa-download"></i> Tải hóa đơn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 3 end -->

    <script src="{{ asset('bill/main/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/html2canvas.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/app.js') }}"></script>
</body>

</html>
