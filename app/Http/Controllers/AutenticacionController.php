<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    public function show(){
        try {

            return view('login');

        } catch (\Throwable $th) {
            return response()->json([
              'status' => false,
              'message' => 'Error en el servidor.',
              'error' => $th->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
           
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()->route('login')
                    ->withErrors($validator)
                    ->withInput();
            }

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->has('remember'))) {
                $user = Auth::user();

                session(['user' => $user]);

                return redirect()->route('home');

            } else {
                return redirect()->route('login')->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
        }
        } catch (\Throwable $th) {
            return response()->json([
            'status' => false,
            'message' => 'Error en el servidor.',
            'error' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error al cerrar sesión.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
