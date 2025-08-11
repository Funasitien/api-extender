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
        ],
        'money' => [
            'title' => 'Monnaie',
            'description' => 'Retourne les informations sur la monnaie',
            'example' => 'Exemple de requête'
        ],
        'social' => [
            'title' => 'Réseaux sociaux',
            'description' => 'Retourne les informations sur les réseaux sociaux',
            'example' => 'Exemple de requête'
        ],
        'shop' => [
            'title' => 'Boutique',
            'description' => 'Retourne les informations sur la boutique',
            'example' => 'Exemple de requête'
        ],
        'root' => [
            'title' => 'État de maintenance',
            'description' => 'Vérifie si le site est en maintenance (0 ou 1) et retourne le message de maintenance',
            'example' => 'Exemple de requête'
        ]
    ]
];
