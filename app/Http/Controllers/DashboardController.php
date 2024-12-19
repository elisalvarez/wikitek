<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        try {

            $user = Auth::user();

            return view('home', compact('user'));

        } catch (\Throwable $th) {
            return response()->json([
              'status' => false,
              'message' => 'Error en el servidor.',
              'error' => $th->getMessage()
            ], 500);
        }
    }

}
