<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        try {
            return jsonResponse('Sesión iniciada correctamente', $this->authService->login($request->validated()));
        } catch (\Exception $e) {
            return validationErrorResponse(['login' => [$e->getMessage()]], $e->getCode());
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            return jsonResponse('Usuario creado correctamente', $this->authService->register($request->validated()));
        } catch (\Exception $e) {
            return validationErrorResponse(['register' => [$e->getMessage()]], $e->getCode());
        }
    }
    public function logout(Request $request)
    {
        try {
            return jsonResponse('Sesión cerrada correctamente', $this->authService->logout($request->user()));
        } catch (\Exception $e) {
            return validationErrorResponse(['logout' => [$e->getMessage()]], $e->getCode());
        }
    }
}