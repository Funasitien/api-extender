<?php

namespace Azuriom\Plugin\ApiExtender\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiImagesController extends Controller
{

    public function images($type, $renderType, $player)
    {

        $skinUrl = url("/api/skin-api/skins/{$player}");
        $url = "https://starlightskins.lunareclipse.studio/render/{$type}/{$player}/{$renderType}?skinUrl={$skinUrl}";
        
        $response = Http::withOptions([
            'verify' => false
        ])->get($url);

        if (!$response->successful()) {
            return response()->json(['error' => 'Impossible de récupérer l\'image', 'url' => $url, 'error' => $response->body()], $response->status());
        }

        return response($response->body())
            ->header('Content-Type', 'image/png');
    }
}