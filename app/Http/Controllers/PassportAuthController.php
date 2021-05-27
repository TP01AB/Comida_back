<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRol;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        if (User::where('email', '=', $request->input('email'))->count() == 1 || User::where('dni', '=', $request->input('dni'))->count() == 1) {
            return response()->json(['message' => ['correcto' => false, 'message' => 'Registro incorrecto. Revise las credenciales'], 'code' => 400], 400);
        }

        $validatedData = $request->validate([
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'dni' => 'required|unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users',
        ]);
        $validatedData['password'] = Hash::make($request->input("password"));

        $user = User::create($validatedData);
        $token = $user->createToken('LaravelAuthApp')->accessToken;

        $userRol = new UserRol();

        $rol = 0;
        if ($request->get('opcion') == 'restaurante') {
            $rol = 3;
        } elseif ($request->get('opcion') == 'repartidor') {
            $rol = 4;
        } elseif ($request->get('opcion') == 'cliente') {
            $rol = 5;
        }

        $userRol->user_id = $user->id;
        $userRol->rol_id = $rol;
        $userRol->save();

        return response()->json(['message' => ['correcto' => true, 'user' => $user, 'access_token' => $token], 'code' => 201], 201);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response()->json(['message' => 'Login incorrecto. Revise las credenciales.', 'code' => 400], 400);
        } else {
            $Token = auth()->user()->createToken('access_token')->accessToken;
            $us = auth()->user();
            if ($us->isActive === 1) {
                $rol=RolController::getRol($us->id);
                return response()->json(['message' => ['user' => $us,'rol'=>$rol ,'access_token' => $Token, 'code' => 200], 200]);
            }else{
                return response()->json(['message' => 'Login incorrecto. Usuario desactivado.', 'code' => 400], 400);
            }
        }
    }
}
