<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

return [
    'routes' => [
        'api' => [
            'status' => true,
            'orders' => [
                'status' => true
            ],
            'payments' => [
                'status' => true,
            ]
        ],
        'web' => [
            'status' => true,
            'providers' => [
                'payment' => [
                    'test' => [
                        'status' => true
                    ]
                ]
            ],
            'payments' => [
                'status' => true,
                'callback' => [
                    'status' => true
                ]
            ]
        ]
    ],
    'database' => [
        'migrations' => [
            'include' => true
        ],
    ],
    'payment' => [
        'providers' => [
            'testpay' => [
                'name' => 'testpay',
                'title' => 'Test Pay',
                'model' => \iLaravel\iOrder\Vendor\Payment\Providers\TestPay::class
            ],
        ]
    ]
];
?>
