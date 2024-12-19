<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use App\Models\NivelInteres;
use App\Models\EstadoCivil;
use App\Models\Carrera;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    public function show(Request $request){
        try {

            $generos = Genero::all();
            $estadosCiviles = EstadoCivil::all();
            $nivelesInteres = NivelInteres::all();
            $carreras = Carrera::all();
    
            return view('registro', compact('generos', 'estadosCiviles', 'nivelesInteres', 'carreras'));

        } catch (\Throwable $th) {
            return response()->json([
              'status' => false,
              'message' => 'Error en el servidor.',
              'error' => $th->getMessage()
            ], 500);
        }
    }

    public function getCarreras($nivelId)
    {
        try {

            $carreras = Carrera::where('id_nivel_interes', $nivelId)->get();
            return response()->json($carreras);

        } catch (\Throwable $th) {
            return response()->json([
              'status' => false,
              'message' => 'Error en el servidor.',
              'error' => $th->getMessage()
            ], 500);
        }
    }

    public function store(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'apellido_paterno' => 'required|string|max:255',
                'apellido_materno' => 'required|string|max:255',
                'edad' => 'required|integer|min:1',
                'id_genero' => 'required|exists:generos,id_genero',
                'id_estado_civil' => 'required|exists:estados_civiles,id_estado_civil',
                'id_nivel_interes' => 'required|exists:niveles_interes,id_nivel_interes',
                'id_carrera' => 'required|exists:carreras,id_carrera',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
                //'password' => 'required|string|min:8|confirmed' // Confirma 
            ],
            [
                'nombre.required' => 'Ingresa el nombre del titular de la cuenta.',
                'email.required' => 'Ingresa el correo electrónico.',
                'email.unique' => 'El correo ingresado ya tiene una cuenta generada.',
                'email.email' => 'El correo debería ser un correo electrónico válido.',
                'password.required' => 'Ingresa la contraseña.',
                'password.min' => 'La contraseña deberá contar con al menos 8 caracteres.',
                'password.regex' => 'La contraseña deberá contar con una mayúscula, un número y un caracter especial.',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'edad' => $request->edad,
                'id_genero' => $request->id_genero,
                'id_estado_civil' => $request->id_estado_civil,
                'id_nivel_interes' => $request->id_nivel_interes,
                'id_carrera' => $request->id_carrera,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            
            Auth::login($user);

            return redirect()->route('home');

        } catch (\Throwable $th) {
            return response()->json([
              'status' => false,
              'message' => 'Error en el servidor.',
              'error' => $th->getMessage()
            ], 500);
          }
    }
}
