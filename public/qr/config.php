<?php
const CONFIG = [
                    // 'DOMAINV2B' => "domain.com", //domain của v2board
                    'TOKEN' => "điền token",//lấy từ api.4ghatde.net
                    'SIGNATIRE' => "điền SIGNATIRE", //lấy từ api.4ghatde.net
                    'KEYWORD' => "", //chữ thường không in hoa
                    'GATE' =>[
                        'MOMO'=> [
                            'PHONE' => "sdt", // số điện thoại nhận tiền hiện tại ko dùng đuọc 
                            'WEBHOOK' => "", //link notify trong 
                            'CALLBACK' => ""
                        ],
                        'BANK'=> [
                            'ACCOUNT_NUMBER' => "stk",
                            'ACCOUNT_NAME' => "tên chủ tài khoản",
                            'BANK_NAME' => "tên ngân hàng",
                            'BANKID' => "970422", //MB 970422 VCB 970436 ACB 970416
                            'CALLBACK' => "https://domain/payment/hook.php", // URL đến file hook.php
                            'WEBHOOK' => "Địa chỉ thông báo trên admin" // link notify trong admin -> payment của v2board (sau khi thêm cổng thanh toán và v2board sẽ có)
                        ]
                    ]
                ];