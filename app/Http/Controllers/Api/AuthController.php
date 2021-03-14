<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return 'Login endpoint.';
    }

    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return response()->json([
            "message" => "User registered successfully"
        ], 201);
    }

    public function index()
    {
        return 'Hello World';
    }
}
