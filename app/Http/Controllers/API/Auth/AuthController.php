<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:5|max:20'
        ]);

        Auth::attempt($request->only('email','password'));

        if (Auth::check()) {
            $token = Auth::user()->createToken('Token')->plainTextToken;
            $response = [
                'message' => 'success',
                'data' => Auth::user(),
                'token' =>$token
            ];

            return response()->json($response,200);
        }

        return response()->json(['error' => 'Unauthorized'],401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
            'c_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('Token')->plainTextToken;

        $response = [
            'message' => 'success',
            'data' => $user,
            'token' => $token
        ];

        return response()->json($response,200);
    }
}
