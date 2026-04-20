<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function store(Request $request)
    {
        try {
            $response = Http::withToken(session('access_token'))
                ->post(config('services.academy_api.url') . '/api/users', [
                    'name' => $request->name,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'role_id' => $request->role_id,
                    'password' => $request->password,
                ]);

            // Si la API falla, lanzamos una excepción manualmente para entrar al catch
            if (!$response->successful()) {
                // Esto nos permitirá ver qué error lanza el BACKEND
                dd("Error de API:", $response->status(), $response->json());
            }

            return back()->with('success', 'Usuario creado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
}
