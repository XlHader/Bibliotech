<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(mixed $data)
    {
        if (!Auth::attempt($data))
            return throw new \Exception('Credenciales incorrectas', 401);

        $user = Auth::user();

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user,
            'message' => 'Sesión iniciada correctamente'
        ];
    }

    public function register(mixed $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user,
            'message' => 'Usuario creado correctamente'
        ];
    }

    public function logout(User $user)
    {
        $user->currentAccessToken()->delete();

        return [
            'user' => null,
            'message' => 'Sesión cerrada correctamente'
        ];
    }
}