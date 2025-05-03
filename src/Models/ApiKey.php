<?php

namespace Azuriom\Plugin\ApiExtender\Models;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    protected $fillable = [
        'name',
        'description',
        'api_key',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function generateKey()
    {
        return bin2hex(random_bytes(32));
    }
} 