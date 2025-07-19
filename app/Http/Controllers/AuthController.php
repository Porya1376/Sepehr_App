<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // Validate Data
        $data = $request->validated();

        // Create Data
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->timeline()->create();

        // Create Token
        return response()->json([
            'message' => 'User registered successfully, timeline created.',
            'user' => $user,
            'token' => $user->createToken('api-token')->plainTextToken]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        // Find User
        $user = User::where('email', $credentials['email'])->first();

        // Check Password
        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Create Token
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
    }
}
