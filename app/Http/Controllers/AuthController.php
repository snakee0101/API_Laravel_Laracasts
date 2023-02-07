<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect('/register');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->input('password'), $user->password) )
            auth()->login($user);

        return redirect('/login');
    }

    public function logout()
    {
        auth()->logout();
    }

    /**
     * Create new API token for current user
     * */
    public function token()
    {
        $token = auth()->user()->createToken('api token');

        return ['token' => $token->plainTextToken];
    }

    public function temp_token()
    {
        $token = auth()->user()->createToken('api token', expiresAt: now()->addMinutes(40));

        return ['token' => $token->plainTextToken];
    }
}
