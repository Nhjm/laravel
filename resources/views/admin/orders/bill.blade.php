<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>DISEE - Invoice HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bill/main/assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('bill/main/assets/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('bill/main/assets/img/favicon.ico') }}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bill/main/assets/css/style.css') }}">
    <style>
        html {
            font-family: 'Roboto';
        }
    </style>
</head>

<body>
    <!-- Invoice 1 start -->
    <div class="invoice-1 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row g-0">
                                    <div class="col-sm-6">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            {{-- <div class="logo">
                                                <img src="assets/img/logos/logo.png" alt="logo">
                                            </div> --}}
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 invoice-id">
                                        <div class="info">
                                            <h1 class="color-white inv-header-1">Bill</h1>
                                            <p class="color-white mb-1">Order Id: <span>{{ $id }}</span></p>
                                            {{-- <p class="color-white mb-0">Created At <span>{{ $created_at }}</span></p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <h4 class="inv-title-1">Invoice To</h4>
                                            <h2 class="name mb-10">{{ $user_name }}</h2>
                                            <p class="invo-addr-1">
                                                {{ $user_phone }} <br />
                                                {{ $user_email }} <br />
                                                {{ $user_address }} <br />
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Invoice From</h4>
                                                <h2 class="name mb-10">Animas Roky</h2>
                                                <p class="invo-addr-1">
                                                    Apexo Inc <br />
                                                    billing@apexo.com <br />
                                                    169 Teroghoria, Bangladesh <br />
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr class="tr">
                                                <th>STT</th>
                                                <th class="text-end"></th>
                                                <th class="pl0 text-start">Product</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order_items as $key => $item)
                                                <tr class="tr">
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>{{ $key + 1 }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl0">{{ $item['name'] }}</td>
                                                    <td class="text-center">
                                                        {{ number_format($item['price_sale']) ?: number_format($item['price_regular']) }}
                                                    </td>
                                                    <td class="text-center">{{ $item['quantity'] }}</td>
                                                    {{-- <td class="text-end">$600.00</td> --}}
                                                </tr>
                                            @endforeach

                                            {{-- <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">Tạm tính</td>
                                                <td class="text-end">$710.99</td>
                                            </tr>
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">Tax</td>
                                                <td class="text-end">$85.99</td>
                                            </tr> --}}
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center f-w-600 active-color">TOTAL PRICE</td>
                                                <td class="f-w-600 text-end active-color">
                                                    {{ number_format($total_price) }} VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-7">
                                        <div class="mb-30 dear-client">
                                            <h3 class="inv-title-1">Terms & Conditions</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been typesetting industry. Lorem Ipsum</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-5">
                                        <div class="mb-30 payment-method">
                                            <h3 class="inv-title-1">Payment Method</h3>
                                            <ul class="payment-method-list-1 text-14">
                                                <li><strong>Account No:</strong> 00 123 647 840</li>
                                                <li><strong>Account Name:</strong> Jhon Doe</li>
                                                <li><strong>Branch Name:</strong> xyz</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-contact clearfix">
                                <div class="row g-0">
                                    <div class="col-lg-9 col-md-11 col-sm-12">
                                        <div class="contact-info">
                                            <a href="tel:+55-4XX-634-7071"><i class="fa fa-phone"></i> +00 123 647
                                                840</a>
                                            <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>
                                                info@themevessel.com</a>
                                            <a href="tel:info@themevessel.com" class="mr-0 d-none-580"><i
                                                    class="fa fa-map-marker"></i> 169 Teroghoria, Bangladesh</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                <i class="fa fa-print"></i> Print Invoice
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                                <i class="fa fa-download"></i> Download Invoice
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 1 end -->

    {{-- <script src="{{ asset('bill/main/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/html2canvas.js') }}"></script>
    <script src="{{ asset('bill/main/assets/js/app.js') }}"></script> --}}
</body>

</html>
