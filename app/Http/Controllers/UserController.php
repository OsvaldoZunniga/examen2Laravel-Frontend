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


            if (!$response->successful()) {
                dd("Error de API:", $response->status(), $response->json());
            }

            return redirect()
                ->route('dashboard.admin')->with('success', 'Usuario creado');
        } catch (\Exception $e) {
            dd("Excepción capturada:", $e->getMessage());
        }
    }
}
