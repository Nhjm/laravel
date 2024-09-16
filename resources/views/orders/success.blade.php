<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <head>
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,700italic,900);

            body {
                font-family: 'Roboto', Arial, sans-serif !important;
            }

            a[href^="tel"] {
                color: inherit;
                text-decoration: none;
                outline: 0;
            }

            a:hover,
            a:active,
            a:focus {
                outline: 0;
            }

            a:visited {
                color: #FFF;
            }

            span.MsoHyperlink {
                mso-style-priority: 99;
                color: inherit;
            }

            span.MsoHyperlinkFollowed {
                mso-style-priority: 99;
                color: inherit;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0;background-color:#EEEEEE;">
        <a href="{{ route('index') }}" class="btn btn-primary mt-3 ms-3">Quay về</a>
        <table cellspacing="0"
            style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE; font-family:'Roboto', Arial !important">
            <tbody>
                <tr>
                    <td align="center" style="padding:20px 23px 0 23px">
                        <table width="600" style="background-color:#FFF; margin:0 auto; border-radius:5px">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="500" style="margin:0 auto">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding:40px 0 35px 0">
                                                        {{-- <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                            target="_blank"
                                                            style="color:#128ced; text-decoration:none;outline:0;"><img
                                                                alt=""
                                                                src="https://www.chewy.com/static/cms/lp/email/logo.png"
                                                                border="0"></a> --}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="font-family:'Roboto', Arial !important">
                                                        <h2
                                                            style="margin:0; font-weight:bold; font-size:40px; color:#444; text-align:center; font-family:'Roboto', Arial !important">
                                                            Cảm ơn bạn đã mua hàng
                                                        </h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"
                                                        style="padding:0 0 15px 0; font-family:'Roboto', Arial !important">
                                                        <p style="text-align: center;">
                                                            {{-- <img src="{{ env('URL') }}/storage/images/ship.gif"
                                                                alt="Order Shipped GIF"> --}}
                                                            <img src="{{ asset('images/ship.gif') }}"
                                                                alt="Order Shipped GIF">
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"
                                                        style="padding:0 0 20px 0; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="margin:10px 0; font-size:16px; color:#000; line-height:12px; font-family:'Roboto', Arial !important">
                                                            Chúng tôi sẽ gửi hàng sớm nhất có thể
                                                        </p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" cellspacing="0"
                                        style="padding:0 0 30px 0; vertical-align:middle">
                                        <table width="850"
                                            style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                                            <tbody>
                                                <tr>
                                                    <td width="50%"
                                                        style="vertical-align:top; border-right:1px solid #E5E5E5">
                                                        <table style="width:100%; border-collapse:collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                                                        <p
                                                                            style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                                            Đơn hàng:
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr style="">
                                                                    <td
                                                                        style="vertical-align:top; padding:0 18px 18px 23px">
                                                                        <table width="50%"
                                                                            style="border-collapse:collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            ID đơn hàng #:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            {{ $order->id }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            Ngày đặt:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            {{ $order->created_at }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                                                            Thanh toán:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                                                            {{ number_format($after_voucher) }}
                                                                                            VNĐ
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        style="font-family:'Roboto', Arial !important;"
                                                                                        colspan="2">
                                                                                        <p
                                                                                            style="font-size:16px; color:#bc0101; margin:0;padding:0; font-weight:bold; font-family:'Roboto', Arial !important">
                                                                                            Tiết kiệm
                                                                                            {{ number_format($total_price - $after_voucher) }}
                                                                                            VNĐ
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td style="vertical-align:top">
                                                        <table width="100%" style="border-collapse:collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                                                        <p
                                                                            style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                                            Địa chỉ nhận hàng:
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="vertical-align:top; padding:0 18px 18px 23px; font-family:'Roboto', Arial !important">
                                                                        <table width="100%"
                                                                            style="border-collapse:collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            {{ $order->user_name }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                                                            {{ $order->user_phone }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family:'Roboto', Arial !important;">
                                                                                        <p
                                                                                            style="font-size:16px; color:#000; margin:0;padding:0; font-family:'Roboto', Arial !important">
                                                                                            {{ $order->user_address }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" cellspacing="0" style="padding:0; vertical-align:middle">
                                        <table width="100%"
                                            style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border-bottom:1px solid #E5E5E5">
                                            <tbody>
                                                <tr>
                                                    <td align="left"
                                                        style="padding:15px 0 15px 15px; font-family:'Roboto', Arial !important"
                                                        width="117">
                                                        <p
                                                            style="font-size:16px; text-transform:uppercase; color:#333333; margin:0; font-weight:900; font-family:'Roboto', Arial !important; ">
                                                            Sản phẩm</p>
                                                    </td>
                                                    <td align="left" width="240">
                                                        {{-- <table style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-family:'Roboto', Arial !important;background-color:#128ced; text-align:center; border-radius:4px; vertical-align:middle;padding: 7px 12px;">
                                                                        <a href="#" target="_blank"
                                                                            style="font-family:'Roboto', Arial !important;color:#fff;border-radius: 4px; font-weight: normal; text-decoration: none; font-size: 14px; ">TRACK
                                                                            PACKAGE</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table> --}}
                                                    </td>
                                                    <td width="60" align="right"
                                                        style="font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                                                            Chi tiết</p>
                                                    </td>
                                                    <td width="80" align="right"
                                                        style="font-family:'Roboto', Arial !important;padding-right:10px;">
                                                        <p
                                                            style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                                                            Đơn giá</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @foreach ($cart_items as $item)
                                    <tr>
                                        <td style=" font-family:'Roboto', Arial !important;padding:0;" align="center">
                                            <table width="100%"
                                                style="border-collapse:collapse;margin: 0 auto;border-bottom: 1px solid #EBEBEB">
                                                <tbody>
                                                    <tr>

                                                        <td width="117" align="right"
                                                            style="padding:24px 0 24px 10px; text-align:left;">
                                                            <a href="https://www.chewy.com/dp/116520?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                                target="_blank"
                                                                style="text-decoration:none; color:#000; outline:0;">
                                                                <img width="100px"
                                                                    src="{{ Storage::url($item['img_thumbnail']) }}"
                                                                    border="0">
                                                            </a>
                                                        </td>
                                                        <td width="270"
                                                            style="vertical-align:middle; padding:0 0 0 10px; font-family:'Roboto', Arial !important;">
                                                            <p
                                                                style="font-size:16px; margin:0; color:#000; line-height:20px; font-family:'Roboto', Arial !important">
                                                                <a href="https://www.chewy.com/dp/116520?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                                    target="_blank"
                                                                    style="text-decoration:none; color:#000; outline:0;">
                                                                    {{ $item['name'] }}</a>
                                                            </p>
                                                        </td>
                                                        <td align="center" width="60"
                                                            style="vertical-align:middle; font-family:'Roboto', Arial !important;padding:0;">
                                                            <p
                                                                style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;text-align:center;">
                                                                {{ $item['quantity'] }} |
                                                                {{ $item['variant_size_name'] }} |
                                                                {{ $item['variant_color_name'] }}
                                                            </p>
                                                        </td>
                                                        <td align="center" width="80"
                                                            style="font-family:'Roboto', Arial !important;padding:0 10px 0 0;">
                                                            <p
                                                                style="font-size:18px; color:#bc0101; margin:0; font-family:'Roboto', Arial !important;text-align:center;font-weight:bold;text-align: right;">
                                                                {{ number_format($item['price_sale']) ?: number_format($item['price_regular']) }}
                                                                VNĐ
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td align="center" style="padding-top:24px; padding-bottom:20px">
                                        <table width="520" style="border-collapse:collapse">
                                            <tbody>
                                                <tr>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                            Tạm tính:
                                                        </p>
                                                    </td>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                            {{ number_format($total_price) }} VNĐ
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                            Phí ship:
                                                        </p>
                                                    </td>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;color:#bc0101;font-weight:bold;">
                                                            FREE</p>
                                                    </td>
                                                </tr>

                                                @foreach ($vouchers as $voucher)
                                                    @foreach ($voucher as $key => $amount)
                                                        <tr>
                                                            <td align="right"
                                                                style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                                <p
                                                                    style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                                    Mã giảm giá:
                                                                </p>
                                                            </td>
                                                            <td align="right"
                                                                style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                                <p
                                                                    style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                                                                    @if ($key === 'fixed')
                                                                        -{{ number_format($amount) }} VNĐ
                                                                    @else
                                                                        -{{ $amount }} %
                                                                    @endif
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach

                                                <tr>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#000; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                                            Thanh toán:
                                                        </p>
                                                    </td>
                                                    <td align="right"
                                                        style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="font-size:18px; color:#bc0101; font-weight:bold; margin:0; font-family:'Roboto', Arial !important">
                                                            {{ number_format($after_voucher) }} VNĐ
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                {{-- <tr>
                    <td align="center" style="padding-top:20px">
                        <table width="604"
                            style="border-collapse:collapse;background-color:#FFF; font-family:'Roboto', Arial !important; border-radius:5px">
                            <tbody>
                                <tr>
                                    <td colspan="4"
                                        style="vertical-align:middle;background-color: #128ced;border-radius: 5px 5px 0 0;">
                                        <table
                                            style="background-color:#128ced; width:100%; border-radius:5px 5px 0 0; border-collapse:collapse">
                                            <tbody>
                                                <tr>
                                                    <td align="center"
                                                        style="vertical-align:middle; padding:22px 0; font-family:'Roboto', Arial !important">
                                                        <p
                                                            style="color:#FFF; font-size:18px; margin:0; font-family:'Roboto', Arial !important">
                                                            Call us at <a href="tel:1-800-672-4399" target="_blank"
                                                                style="text-decoration:none; color:#FFF; font-weight:bold;outline:0;">1-800-672-4399</a>
                                                            or reply to this email
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <table cellpadding="20" style="width:100%; border-collapse:collapse">
                                            <tbody>
                                                <tr>
                                                    <td align="center"
                                                        style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important">
                                                        <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                            target="_blank"
                                                            style="outline:0;color:#128ced; text-decoration:none">
                                                            <p style="margin:0 0 8px 0"><img
                                                                    src="https://www.chewy.com/static/cms/lp/email/csr_icon.png"
                                                                    border="0"></p>
                                                            <p
                                                                style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                                                Customer <br>
                                                                Service
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td align="center"
                                                        style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important; vertical-align:bottom">
                                                        <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                            target="_blank"
                                                            style="outline:0;color:#128ced; text-decoration:none">
                                                            <p
                                                                style="margin:0 0 14px 0; font-family:'Roboto', Arial !important">
                                                                <img src="https://www.chewy.com/static/cms/lp/email/shipping_icon.png"
                                                                    border="0">
                                                            </p>
                                                            <p
                                                                style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                                                Free Shipping <br>
                                                                orders $49+
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td align="center"
                                                        style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important">
                                                        <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                            target="_blank"
                                                            style="outline:0;color:#128ced; text-decoration:none">
                                                            <p style="margin:0 0 8px 0"><img
                                                                    src="https://www.chewy.com/static/cms/lp/email/moneyback_icon.png"
                                                                    border="0">
                                                            </p>
                                                            <p
                                                                style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                                                Satisfaction <br>
                                                                Guaranteed
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td align="center" style="font-family:'Roboto', Arial !important">
                                                        <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                                            target="_blank"
                                                            style="outline:0;color:#128ced; text-decoration:none">
                                                            <p style="margin:0 0 8px 0"><img
                                                                    src="https://www.chewy.com/static/cms/lp/email/return_icon.png"
                                                                    border="0"></p>
                                                            <p
                                                                style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                                                Hassle-Free <br>
                                                                Returns
                                                            </p>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top:29px; padding-bottom:50px">
                        <table style="width:100%">
                            <tbody>
                                <tr>
                                    <td align="center" style="font-family:'Roboto', Arial !important">
                                        <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation"
                                            target="_blank"
                                            style="color:#128ced; text-decoration:none;outline:0;"><img
                                                src="https://www.chewy.com/static/cms/lp/email/gray_logo.png"
                                                border="0"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </body>


</body>

</html>
