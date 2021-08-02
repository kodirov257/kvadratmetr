<?php

return [
    // "sms.ru", "array"
    'driver' => env('SMS_DRIVER', 'sms.uz'),

    'drivers' => [
        'sms.ru' => [
            'app_id' => env('SMS_SMS_RU_APP_ID'),
            'url' => env('SMS_SMS_RU_URL'),
        ],
        'sms.uz' => [
            'url' => env('SMS_SMS_UZ_URL', 'https://185.74.5.117:13002/cgi-bin/sendsms'),
            'username' => env('SMS_SMS_UZ_USERNAME', 'username'),
            'password' => env('SMS_SMS_UZ_PASSWORD', 'password'),
            'smsc' => env('SMS_SMS_UZ_SMSC', 'smsc1'),
            'from' => env('SMS_SMS_UZ_FROM', '6100'),
            'charset' => env('SMS_SMS_UZ_CHARSET', 'utf-8'),
            'coding' => env('SMS_SMS_UZ_CODING', 2),
        ],
    ],
];