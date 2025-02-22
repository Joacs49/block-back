<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostAuth\PostAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponseHelper;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(PostAuth $request) 
    {
        try {
            if (!Auth::attempt($request->only('email','password'))) {
                return HttpResponseHelper::make()
                    ->internalErrorResponse('Las credenciales ingresadas son incorrectas.')
                    ->send();
            }

            $user = User::where('email', $request->email)->firstOrFail();

            $token = $user->createToken('token')->plainTextToken;

            return HttpResponseHelper::make()
                ->successfulResponse('Inicio de sesión exitoso.', [
                    'token' => $token,
                    'user' => $user
                ])
                ->send();

        } catch (\Exception $e) {
            return HttpResponseHelper::make()
                ->internalErrorResponse('Ocurrió un problema: ' . $e->getMessage())
                ->send();
        }
    }

    public function logout(PostAuth $request) 
    {
        try {
            $user = $request->user();
            $user->tokens()->delete();

            return HttpResponseHelper::make()
            ->successfulResponse('Cierre de sesión exitoso.')
            ->send();

        } catch (\Exception $e) {
            return HttpResponseHelper::make()
            ->internalErrorResponse('Ocurrio un problema.' . $e->getMessage())
            ->send();
        }
    }
}
