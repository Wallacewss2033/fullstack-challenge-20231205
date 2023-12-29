<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // TODO: Tratar o FormRequest

        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json([
            'message' => 'Logado com sucesso!',
            'data' => [
                'token' => auth()->user()->createToken('auth-token')->plainTextToken,
            ]
        ], 200);
    }
}
