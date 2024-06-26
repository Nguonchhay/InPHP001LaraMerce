<?php

return [
    'product_pagination' => env('PRODUCT_PAGINATION', 10),
    'init_users' => [
        'admin' => [
            'role' => ROLE_ADMIN,
            'name' => 'Admin User',
            'email' => env('ADMIN_EMAIL', 'admindefault@gmail.com'),
            'password' => env('ADMIN_PASS'),
        ]
    ]
];
