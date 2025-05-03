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
        ]
    ]
];
