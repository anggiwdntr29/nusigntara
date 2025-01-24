<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password|min:8',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        
        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Menggunakan Hash::make untuk password
        ]);

        // Login pengguna dan mendapatkan token
        $token = auth('api')->login($user);

        // Mengembalikan response dengan token
        return response()->json([
            'success' => 'user_registered',
            'message' => 'User successfully registered',
            'auth' => $this->respondWithToken($token)->original
        ]);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'bad_request',
                'message' => 'Email atau password salah',
            ], 401);
      }
  
        $user = User::where('email', request('email'))->first();
        return response([
            'success' => 'user_login',
            'auth' => $this->respondWithToken($token)->original,
        ]);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->invalidate(true);
        // auth('api')->logout();
        return response()->json([
          'success' => 'user_logout',
          'message' => 'Successfully logged out'
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 'lifetime'
        ]);
    }
}
