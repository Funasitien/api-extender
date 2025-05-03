<?php

namespace Azuriom\Plugin\ApiExtender\Controllers;

use Azuriom\Http\Controllers\Controller;

class ApiExtenderHomeController extends Controller
{
    /**
     * Show the home plugin page.
     */
    public function index()
    {
        return view('apiextender::index');
    }
}
