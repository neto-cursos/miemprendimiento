<?php

namespace App\Http\Controllers\WebAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function signIn(Request $request)
    {
        $request->validate(
            [
                'email'    => 'required|string',
                'password' => 'required|string',
            ]
        );

        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return response()->json([], 204);
        }

        return response()->json(['error' => 'Invalid credentials']);
    }

    public function logOut(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([], 204);
    }
}
