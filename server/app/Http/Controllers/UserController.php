<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Register(Request $request): JsonResponse
    {
        $login = $request->get('login');
        $password = Hash::make($request->get('password'));

        if(User::where('login', '=', $login)->exists()) {
            return response()->json([
                'status' => 'error',
                'error' => 'login exists'
            ])->setStatusCode(404);
        }

        $user = new User();

        $user->login = $login;
        $user->password = $password;

        $user->save();

        return response()->json([
            'status' => 'ok',
            'message' => 'created',
        ])->setStatusCode(204);
    }

    public function Login(Request $request)
    {
        if(!User::where('login', '=', $request->login)->exists())
        {
            return response()->json([
                'status' => 'error',
                'error' => 'user does not exists'
            ])->setStatusCode(400);
        }

        $user = User::where('login', '=', $request->login)->first();

        if(Hash::check($request->get('password'), $user->password))
        {
            // return redirect('/')->route('/', ['login' => $user->login]);
            return response()->json([
                'status' => 'ok',
                'message' => 'logged in',
                'login' => $user->login
            ]);
        }
        
        return response()->json([
            'status' => 'error',
            'error' => 'incorrect password',
            'db_password' => $user->password,
            'has_password' => Hash::make($request->get('password'))
        ])->setStatusCode(400);
    }
}
