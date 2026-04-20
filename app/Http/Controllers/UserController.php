<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        try {
            $data = $response = Http::withToken(session('access_token'))
                ->get(config('services.academy_api.url') . '/api/users');


            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return view('layouts.partials.dashboard-content', [
                'users' => $data['data']['data']
            ]);
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            // CORRECCIÓN 1: Usar comillas dobles para la interpolación de {$id}
            // CORRECCIÓN 2: Asegurar que pedimos JSON explícitamente
            $response = Http::withToken(session('access_token'))
                ->acceptJson()
                ->get(config('services.academy_api.url') . "/api/users/{$id}");

            if (!$response->successful()) {
                // Si la API falla, aquí verás el error real
                dd("Error de API:", $response->status(), $response->json());
            }

            return view('layouts.users.update', [
                // CORRECCIÓN 3: Pasamos el array de datos, no el objeto de respuesta
                'users' => $response->json()
            ]);
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
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


            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return redirect()
                ->route('dashboard.admin')->with('success', 'Usuario creado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
    public function update(Request $request)
    {
        try {
            $response = Http::withToken(session('access_token'))
                ->acceptJson()
                // CORRECCIÓN: Usar comillas dobles " " y no ` `
                ->put(config('services.academy_api.url') . "/api/users/{$request->id}", [
                    'name' => $request->name,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'role_id' => $request->role_id,
                    'password' => $request->password, // El backend debe ignorarlo si viene vacío
                ]);

            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return back()->with('success', 'Usuario actualizado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $response = Http::withToken(session('access_token'))
                ->acceptJson()

                ->delete(config('services.academy_api.url') . "/api/users/{$id}");

            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return redirect()->route('users.index')->with('success', 'Usuario eliminado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
    public function restore($id)
    {
        try {
            $response = Http::withToken(session('access_token'))
                ->acceptJson()

                ->patch(config('services.academy_api.url') . "/api/users/{$id}/restore");

            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return redirect()->route('users.index')->with('success', 'Usuario restaurado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
}
