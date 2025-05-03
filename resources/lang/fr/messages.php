<?php

return [
    'title' => 'API Extender',
    'auth' => [
        'title' => 'Authentification',
        'description' => 'Toutes les requêtes API nécessitent une clé API valide. Vous devez inclure votre clé API dans l\'en-tête de la requête :',
        'header' => 'API-Key: votre_cle_api'
    ],
    'endpoints' => [
        'servers' => [
            'title' => 'Liste des serveurs',
            'description' => 'Retourne la liste de tous les serveurs',
            'example' => 'Exemple de requête'
        ],
        'roles' => [
            'title' => 'Liste des rôles',
            'description' => 'Retourne la liste de tous les rôles',
            'example' => 'Exemple de requête'
        ],
        'users' => [
            'title' => 'Liste des utilisateurs',
            'description' => 'Retourne la liste de tous les utilisateurs',
            'example' => 'Exemple de requête'
        ]
    ]
];
