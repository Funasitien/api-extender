<?php

namespace Azuriom\Plugin\ApiExtender\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Azuriom\Plugin\ApiExtender\Middleware\VerifyApiKey;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware(VerifyApiKey::class);
    }

    /**
     * Show the plugin API default page.
     */
    public function index()
    {
        return response()->json('Hello World!');
    }

    public function servers()
    {
        $servers = Server::all();
        return response()->json($servers);
    }

    public function roles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function users()
    {
        $users = User::select('id', 'name', 'role_id', 'is_banned')->get();
        return response()->json($users);
    }
    

}
