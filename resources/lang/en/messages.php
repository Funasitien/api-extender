<?php

return [
    'title' => 'API Extender',
    'auth' => [
        'title' => 'Authentication',
        'description' => 'All API requests require a valid API key. You must include your API key in the request header:',
        'header' => 'API-Key: your_api_key'
    ],
    'endpoints' => [
        'servers' => [
            'title' => 'Server List',
            'description' => 'Returns a list of all servers',
            'example' => 'Request example'
        ],
        'roles' => [
            'title' => 'Roles List',
            'description' => 'Returns a list of all roles',
            'example' => 'Request example'
        ],
        'users' => [
            'title' => 'Users List',
            'description' => 'Returns a list of all users',
            'example' => 'Request example'
        ],
        'money' => [
            'title' => 'Money',
            'description' => 'Returns money information',
            'example' => 'Request example'
        ],
        'social' => [
            'title' => 'Social Networks',
            'description' => 'Returns social networks information',
            'example' => 'Request example'
        ],
        'shop' => [
            'title' => 'Shop',
            'description' => 'Returns shop information',
            'example' => 'Request example'
        ],
        'root' => [
            'title' => 'Maintenance Status',
            'description' => 'Checks if the site is under maintenance (0 or 1) and returns the maintenance message',
            'example' => 'Request example'
        ]
    ]
];
